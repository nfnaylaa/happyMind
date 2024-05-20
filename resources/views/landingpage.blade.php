@extends('layouts.main')

@section('container')
    <!-- Deteksi Stress -->
    <figure class="text-center my-3">
      <blockquote class="blockquote">
        <p class="">Hallo Happy Student, Keep Your Mind Happy!</p>
      </blockquote>
      <figcaption class="blockquote-footer">
        <cite title="Source Title">happyMind</cite>
      </figcaption>
    </figure> 

    <div class="card mb-3 my-5">
      <img src="https://source.unsplash.com/1200x300?stress" class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title d-flex justify-content-center">Deteksi Tingkat Stress</h5>
        <p class="card-text d-flex justify-content-center">Isi kuesioner singkat untuk mengetahui tingkat stress Anda saat ini.</p>
        <a href="/deteksi-stress" class="btn btn-outline-secondary d-grid gap-2 col-6 mx-auto">Deteksi Sekarang</a>
      </div>
    </div>
    <!-- Start tips and tricks section -->
<section class="section-tips">
  <h2 class="section-heading text-center">Tips</h2>
    <div class="container">
      <div class="row">
      @foreach ($Tips as $tip)
        <div class="col-md-6 mb-3">
          <div class="card">
            <img src="https://source.unsplash.com/300x150?meditation" class="card-img-top" alt="Tip 1">
            <div class="card-body">
              <h5 class="card-title">{{ $tip->tittle }}</h5>
              <p class="card-text">{!!  $tip->excerpt !!}.</p>
              <a href="/tips-{{ $tip->slug }}" class="btn btn-outline-secondary">Baca Selengkapnya</a>
            </div>
          </div>
        </div>
        @endforeach 
      </div>
    </div>
  </section>
  <!-- End tips and tricks section -->
  
  <!-- Start diary section -->
  <section class="section-diary">
    <div class="container my-3">
      <h2 class="section-heading text-center">Jurnal Harian</h2>
      <div class="row">
        <div class="col-md-6 mb-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Konsultasi</h5>
              <img src="https://source.unsplash.com/1200x300?chat" class="card-img-top" alt="...">
              <p class="card-text">HappyMind memiliki fitur konsultasi berupa chat dengan Konselor terpercaya yang siap membantu pengguna dalam mengatasi masalah atau stres yang sedang dihadapi.</p>
              <a href="/chat" class="btn btn-outline-secondary">Buka Jurnal Harian</a>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Pemantauan Emosi</h5>
              <img src="https://source.unsplash.com/1200x300?emotion" class="card-img-top" alt="...">
              <p class="card-text">Pemantauan emosi adalah cara yang efektif untuk mengatasi stress. Catat emosimu setiap hari dan lihat perubahannya.</p>
              <a href="/emotions" class="btn btn-outline-secondary">Buka Pemantauan Emosi</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End diary section -->
  
  <!-- Start reminder section -->
<section class="reminder">
  <div class="card mb-3 my-5">
    <img src="https://source.unsplash.com/1200x300?reminder" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title d-flex justify-content-center">Fitur Pengingat Jadwal Belajar/Kegiatan</h5>
      <p class="card-text d-flex justify-content-center">HappyMind juga memiliki fitur pengingat jadwal belajar atau kegiatan lainnya agar pengguna tidak melewatkan kegiatan penting. Anda dapat menambahkan jadwal belajar atau kegiatan sehari-hari dan HappyMind akan memberikan pengingat saat waktu yang ditentukan tiba.</p>
      <a href="/schedules" class="btn btn-outline-secondary d-grid gap-2 col-6 mx-auto">Coba Sekarang</a>
    </div>
  </div>
  </section>
  <!-- End reminder section -->
@endsection