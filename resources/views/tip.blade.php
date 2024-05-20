@extends('layouts.main')

@section('container')
<div class="row justify-content-center mt-4">
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

<div class="container my-3">
    <div class="card mb-3">
        <img src="https://source.unsplash.com/1200x300?heal" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title">{{ $tip->tittle}}</h5>
          <p class="card-text">{!! $tip->body !!}</p>
          <p class="card-text"><small class="text-body-secondary">{{ $tip->created_at->diffForHumans() }}</small></p>
        </div>
      </div>
</div>
@endsection