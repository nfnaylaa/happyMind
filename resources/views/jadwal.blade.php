@extends('layouts.main')

@section('container')
    <div class="container">
        <section class="border-bottom my-3">
            <ul class="nav nav-tabs">
              <li class="nav-item">
                <a class="nav-link " aria-current="page" href="/dashboard">Grafik</a>
              </li>
              <li class="nav-item">
                <a class="nav-link text-light" href="/dashboard-keseharian">Keseharian</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="/dashboard-jadwal">Jadwal</a>
              </li>
            </ul>
          </section>
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Jadwal Kegiatan {{ auth()->user()->username }}</div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Kegiatan</th>
                                    <th>Tanggal/Waktu</th>
                                    <th>Keterangan</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{ $schedule->title }}</td>
                                        <td>{{ $schedule->date_time }}</td>
                                        <td>{{ $schedule->description }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection