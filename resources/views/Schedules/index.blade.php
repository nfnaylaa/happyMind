@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Jadwal Kegiatan {{ auth()->user()->username }}</div>
                    <div class="card-body">
                        <a href="{{ route('schedules.create') }}" class="btn btn-secondary mb-3">Tambah Jadwal</a>
                        @if (session('success'))
                            <div class="alert alert-secondary">
                                {{ session('success') }}
                            </div>
                        @endif
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
                                        <td>
                                            <a href="{{ route('schedules.edit', $schedule) }}" class="btn btn-sm btn-secondary">Ubah</a>
                                            <form action="{{ route('schedules.destroy', $schedule) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this schedule?')">Hapus</button>
                                            </form>
                                        </td>
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
{{-- @extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Jadwal Kegiatan {{ auth()->user()->username }}</div>
                    <div class="card-body">
                        <a href="{{ route('schedules.create') }}" class="btn btn-secondary mb-3">Tambah Jadwal</a>
                        @if (session('success'))
                            <div class="alert alert-secondary">
                                {{ session('success') }}
                            </div>
                        @endif
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
                                        <td id="keterangan-{{ $schedule->id }}">Akan Datang</td>
                                        <td>
                                            <a href="{{ route('schedules.edit', $schedule) }}" class="btn btn-sm btn-secondary">Ubah</a>
                                            <form action="{{ route('schedules.destroy', $schedule) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this schedule?')">Hapus</button>
                                            </form>
                                            <button type="button" class="btn btn-sm btn-success" onclick="selesai('{{ $schedule->date_time }}', {{ $schedule->id }})">Selesai</button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function selesai(scheduleDateTime, scheduleId) {
            var keteranganElement = document.getElementById('keterangan-' + scheduleId);
            var currentTime = new Date().getTime();
            var scheduleTime = new Date(scheduleDateTime).getTime();

            if (currentTime > scheduleTime) {
                keteranganElement.textContent = 'Terlewat';
            } else {
                keteranganElement.textContent = 'Selesai';
            }
        }
    </script>
@endsection --}}

