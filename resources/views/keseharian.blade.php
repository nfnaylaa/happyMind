@extends('layouts.main')

@section('container')
<div class="container">
    <section class="border-bottom my-3">
      <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link text-light" aria-current="page" href="/dashboard">Grafik</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="/dashboard-keseharian">Keseharian</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-light" href="/dashboard-jadwal">Jadwal</a>
        </li>
      </ul>
    </section>
    <section class="my-3">
      <h3 class="text-center text-light">Jurnal Harian {{ auth()->user()->username }}</h3>
        <div class="row">
            @foreach ($emotions as $emotion)
              @if (!empty($emotion->description))
              <div class="col-md-12">
                <div class="card">
                  <div class="card-body">
                      <h5 class="card-title">{{ $emotion->description }}</h5>
                      <h6 class="card-subtitle mb-2 text-muted">{{ $emotion->created_at->diffForHumans() }}</h6>
                      {{-- <p class="card-text">{{  }}</p> --}}
                  </div>
                </div>
              </div>
              @endif
            @endforeach
        </div>
    </section>
</div>
    
@endsection