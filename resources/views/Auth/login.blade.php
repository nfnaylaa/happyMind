@extends('layouts.main')

@section('container')
<div class="container vh-100 d-flex justify-content-center align-items-center">
    <div class="col-md-6">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-secondary bg-gradient text-white text-center">
                <h4>{{ __('Masuk') }}</h4>
            </div>

            <div class="card-body p-5">
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-group mb-4">
                        <label for="username" class="form-label">{{ __('Username') }}</label>
                        <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>
                        @error('username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group form-check mb-4">
                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                        <label class="form-check-label" for="remember">{{ __('Ingat Saya') }}</label>
                    </div>

                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-secondary bg-gradient btn-block">{{ __('Masuk') }}</button>
                    </div>

                    <div class="text-center">
                        <small>Belum punya akun? <a href="{{ route('register') }}">{{ __('Daftar') }}</a></small>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
