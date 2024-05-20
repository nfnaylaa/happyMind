@extends('layouts.main')

@section('container')
<div class="container p-3">
    <h1 class="text-center">Kuesioner Stres Akademik</h1>
    <form method="POST" action="{{ route('kuesioner.submit') }}">
        @csrf
        <div class="row justify-content-around">
            @foreach ($pertanyaan as $key => $pertanyaan)
            <div class="col-md-5 border rounded mx-2 my-2 ms-auto p-2 bg-csage">
                <div class="form-groups">
                    <label for="response_{{ $key }}"><strong>{{ $key + 1 }}. {{ $pertanyaan->questions }}</strong></label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="response_{{ $key }}" id="response_{{ $key }}_1" value="1">
                        <label class="form-check-label" for="response_{{ $key }}_1">
                            Sangat Tidak Setuju
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="response_{{ $key }}" id="response_{{ $key }}_2" value="2">
                        <label class="form-check-label" for="response_{{ $key }}_2">
                            Tidak Setuju
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="response_{{ $key }}" id="response_{{ $key }}_3" value="3">
                        <label class="form-check-label" for="response_{{ $key }}_3">
                            Netral
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="response_{{ $key }}" id="response_{{ $key }}_4" value="4">
                        <label class="form-check-label" for="response_{{ $key }}_4">
                            Setuju
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="response_{{ $key }}" id="response_{{ $key }}_5" value="5">
                        <label class="form-check-label" for="response_{{ $key }}_5">
                            Sangat Setuju
                        </label>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        <button type="submit" class="btn btn-secondary d-grid gap-2 col-6 mx-auto">Submit</button>
    </form>
</div>
@endsection
