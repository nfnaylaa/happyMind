@extends('layouts.main')

@section('container')

<div class="container p-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card text-center bg-csage">
                <div class="card-header">
                    Hasil Deteksi Stress Akademik
                </div>
                <div class="card-body">
                    <h5 class="card-title"> {{ auth()->user()->name }}</h5>
                    <p class="card-text">Stress Level: {{ $stressLevel }}</p>
                    <p class="card-text">Persentase: {{ $formattedPercentage}}</p>
                </div>
                <div class="card-footer text-body-secondary">
                   happyMind - {{ $academicStress->created_at->format('F j, Y - H:i')}}
                </div>
            </div>
        </div>
    </div>
    <div class="row justify-content-center mt-4">
        <div class="col-md-6 text-center">
            <a class="btn btn-primary" href="/deteksi-stress">Ulangi</a>
            <a class="btn btn-primary" href="/dashboard">Dashboard</a>
        </div>
    </div>
</div>
@endsection