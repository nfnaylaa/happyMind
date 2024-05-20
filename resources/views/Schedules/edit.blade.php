@extends('layouts.main')

@section('container')
    <div class="container">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card">
                    <div class="card-header">Edit Jadwal</div>
                    <div class="card-body">
                        <form action="{{ route('schedules.update', $schedule) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="title" class="form-label">Kegiatan</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ $schedule->title }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Deskripsi</label>
                                <textarea class="form-control" id="description" name="description" required>{{ $schedule->description }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="date_time" class="form-label">Tanggal/Waktu</label>
                                <input type="datetime-local" class="form-control" id="date_time" name="date_time" value="{{ $schedule->date_time }}" required>
                            </div>
                            <button type="submit" class="btn btn-primary">Perbarui</button>
                            <a href="{{ route('schedules.index') }}" class="btn btn-link">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
