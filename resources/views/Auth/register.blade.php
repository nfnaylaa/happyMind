@extends('layouts.main')

@section('container')
<div class="container">
    <div class="row justify-content-center p-3">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">{{ __('Silahkan Daftar') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }} " enctype="multipart/form-data">
                        @csrf

                        <div class="mb-1">
                            <label for="name" class="form-label">{{ __('Nama') }}</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="mb-1">
                            <label for="email" class="form-label">{{ __('Email') }}</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>
                            
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        
                        <div class="mb-1">
                            <label for="username" class="form-label">{{ __('Username') }}</label>
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required>
                            
                            @error('username')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-1">
                            <label for="uni" class="form-label">{{ __('Instansi') }}</label>
                            <input id="uni" type="text" class="form-control @error('uni') is-invalid @enderror" name="uni" value="{{ old('uni') }}" required autofocus>

                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label for="password" class="form-label">{{ __('Password') }}</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>
                                    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-1">
                                    <label for="password-confirm" class="form-label">{{ __('Konfirmasi Password') }}</label>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="image" class="form-label">Foto Profile</label>
                            <input class="form-control form-control-sm" id="image" name="image" type="file">
                        </div>

                        <!-- Form field untuk memilih peran -->
                        <div class="row mb-1">
                            <label for="role" class="form-label">{{ __('Daftar Sebagai') }}</label>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" id="pasien" value="pasien" required>
                                        <label class="form-check-label" for="pasien">
                                            Pasien
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="role" id="psikolog" value="psikolog" required>
                                        <label class="form-check-label" for="psikolog">
                                            Psikolog
                                        </label>
                                    </div>
                                </div>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Daftar') }}
                            </button>
                            <small class="text-center mt-2">Sudah punya akun?<a href="/login">Masuk</a></small>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection    
