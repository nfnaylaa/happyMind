
@extends('layouts.main')
@section('container')
@if(auth()->check() && auth()->user()->role == 'pasien')
<div class="container">
        <section class="border-bottom my-3">
          <ul class="nav nav-tabs">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="/dashboard">Grafik</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="/dashboard-keseharian">Keseharian</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-light" href="/dashboard-jadwal">Jadwal</a>
            </li>
          </ul>
        </section>
        <section class="border-bottom my-3 ">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-md-5 text-center">
                <div class="profile">
                  <img src="{{ asset('storage/public/'. auth()->user()->image) }}" class="profile-picture rounded-circle img-fluid" style="width: 100px; height:100px;" alt="Profile Picture">
                  <h2 class="profile-name">{{ auth()->user()->name }}</h2>
                  <h4 class="text-light"> {{ auth()->user()->uni }}</h4>
                </div>
              </div>
            </div>
          </div>
        </section>
          <div class="row justify-content-between">
                <div class="col-md-6 my-2 bg-light border border-secondary rounded">
                    <h4 class="mb-3 text-center text-sageold">Statistik Emosi</h4>
                    <!-- Statistik Emosi -->
                    <canvas id="emotionChart"></canvas>
                </div>
                @if(auth()->check() && isset($stress) && isset($stressLevel))
                <div class="col-md-6 my-2">
                  <div class="card text-center">
                    <div class="card-header">
                      Hasil Deteksi Stress
                    </div>
                    <div class="card-body" style="height:472;">
                      <img src="https://source.unsplash.com/1200x300?emoticon" class="card-img-top">
                      <h5 class="card-title">{{ auth()->user()->name }}</h5>
                      <p class="card-text">Stress Level: {{ $stressLevel }}</p>
                      <a href="/deteksi-stress" class="btn btn-secondary">Test Lagi</a>
                    </div>
                    <div class="card-footer text-body-secondary">
                      {{ $stress->diffForHumans() }}
                    </div>
                  </div>
                </div>
                @else
                <div class="col-md-6 my-2">
                  <div class="card text-center">
                    <div class="card-header">
                      Hasil Deteksi Stress
                    </div>
                    <div class="card-body" style="height:472;">
                      <img src="https://source.unsplash.com/1200x300?emoticon" class="card-img-top">
                      <h5 class="card-title">{{ auth()->user()->name }}</h5>
                      <p class="card-text">Kamu Belum Test</p>
                      <a href="/deteksi-stress" class="btn btn-secondary">Test Sekarang</a>
                    </div>
                  </div>
                </div>
                @endif

          </div>
      </div>
      

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        var ctx = document.getElementById('emotionChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: {!! json_encode($chartData['labels']) !!},
                datasets: [{
                    label: 'Emotion Count',
                    data: {!! json_encode($chartData['data']) !!},
                    backgroundColor: {!! json_encode($chartData['backgroundColor']) !!},
                    borderColor: {!! json_encode($chartData['borderColor']) !!},
                    borderWidth: {!! json_encode($chartData['borderWidth']) !!}
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        precision: 0
                    }
                }
            }
        });
    </script>
  <script src="bootstrap-5.3.0-alpha1-dist/js/bootstrap.bundle.min.js"></script>
  @else(auth()->check() && auth()->user()->role == 'psikolog')
  <div class="container">
    <section class="border-bottom p-3 ">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6 text-center">
            <div class="profile">
              <img src="{{ asset('storage/public/'. auth()->user()->image) }}" class="profile-picture rounded-circle img-fluid" style="width: 150px; height:150px;" alt="Profile Picture">
              <h2 class="profile-name">{{ auth()->user()->name }}</h2>
              <h4 class="text-light"> {{ auth()->user()->uni }}</h4>
            </div>
          </div>
        </div>
      </div>
    </section>
    <form>
      <div class="row justify-content-center p-3">
        <div class="col-md-6">
          <div class="input-group mb-2">
            <form action="/dashboard">
              <input type="text" name="cari" class="form-control" placeholder="Cari pasien..." value="{{ request('cari') }}">
                <div class="input-group-append">
                  <button type="submit" class="btn btn-secondary">Cari</button>
                </div>
            </form>
          </div>
        </div>
      </div>    
    </form>
    <p>Daftar Pasien:</p>
    
    <ul>
        @foreach ($patients as $patient)
            <ol class="list-group list-group">
              <li class="list-group-item">
                <a class="text-dark text-decoration-none" href="{{ route('monitor', ['username' => $patient->username]) }}">
                  <img src="{{ asset('storage/public/'. $patient->image) }}" class="rounded" style="width: 50px; height: 50px;">
                  {{ $patient->name }}
              </a>
                </li>
            </ol>
        @endforeach
    </ul>
  </div>
@endif
@endsection