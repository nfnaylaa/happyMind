@extends('layouts.main')

@section('container')
<div class="container">
    <h1 class="mb-3 text-center">Tips Mengatasi Stress Akademik</h1>         
    <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/tips">
            <div class="input-group input-group-sm mb-3 ">
                <input type="text" class="form-control" name="cari" value="{{ request('cari') }}">
                <div class="input-group-append">
                  <button class="btn btn-secondary" type="submit" id="search-button">Cari</button>
                </div>
            </div> 
            </form>
        </div>
    </div>
    </div> 
    <div class="row row-cols-1 row-cols-md-2 g-4 p-3">
        @foreach ($Tips as $tip)
          <div class="col">
              <div class="card h-100">
              <img src="https://source.unsplash.com/500x300?heal" class="card-img-top" alt="...">
              <div class="card-body ">
                  <h5 class="card-title">{{ $tip->tittle }}</h5>
                  <p class="card-text">{!!  $tip->excerpt !!}<a href="/tips-{{ $tip->slug }}"> Baca selengkapnya... </a></p>
              </div>
              <div class="card-footer bg-bblue">
                  <small class="text-body-secondary ">{{ $tip->created_at->diffForHumans() }}</small>
              </div>
              </div>
          </div>
        @endforeach 
      </div>  
</div> 
@endsection