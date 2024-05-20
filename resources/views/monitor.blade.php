
@extends('layouts.main')
@section('container')
      <div class="container">
        <div class="section text-center text-light my-2 border-bottom">
          <h3>Dashboard {{ $user->username }} </h3>
        </div>
          <div class="row justify-content-between">
                <div class="col-md-6 my-2 bg-light border border-secondary rounded">
                    <h4 class="mb-3 text-center text-sageold">Statistik Emosi</h4>
                    <!-- Statistik Emosi -->
                    <canvas id="emotionChart"></canvas>
                </div>
                @if($user && isset($stress) && isset($stressLevel))
                    <div class="col-md-6 my-2">
                        <div class="card text-center">
                            <div class="card-header">
                                Hasil Deteksi Stress
                            </div>
                            <div class="card-body" style="height:472;">
                                <img src="https://source.unsplash.com/1200x300?emoticon" class="card-img-top">
                                <h5 class="card-title">{{ $user->name }}</h5>
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
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <p class="card-text">Belum Melakukan Test</p>
                            </div>
                        </div>
                    </div>
                @endif

          </div>
      </div>

      <!-- Jurnal Harian -->

<section class="my-3">
    <h3 class="text-center text-light">Jurnal Harian</h3>
    <div class="row">
      @foreach ($emotions as $emotion)
        @if (!empty($emotion->description))
        <div class="col-md-6 my-2">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{ $emotion->description }}</h5>
              <h6 class="card-subtitle mb-2 text-muted">{{ $emotion->created_at->diffForHumans() }}</h6>
              @isset($emotion->comment)
                <p class="card-text text-success">{{ $emotion->comment }}</p>
                <p class="card-text ">Komentar oleh: {{ auth()->user()->name}}</p>
              @else
                
              @endisset
              <form action="{{ route('emotions.comment.store', ['emotionId' => $emotion->id, 'commentedUserId' => $emotion->user_id]) }}" method="POST">
                @method('PUT')
                @csrf
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Tambahkan komentar" name="comment" aria-describedby="button-addon2">
                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Kirim</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        @endif
      @endforeach
      
        <div class="col-md-6 my-2">
            <div class="card">
                <div class="card-header">Jadwal Kegiatan {{ $user->username }}</div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Kegiatan</th>
                                <th>Tanggal/Waktu</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{ $schedule->title }}</td>
                                    <td>{{ $schedule->date_time }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

    </div>
    </div>
  </section>
  
      

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
  @endsection