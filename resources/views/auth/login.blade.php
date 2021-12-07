@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
@endsection

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow p-3 mb-5 bg-body rounded">
                <h5 class="text-center">ورود</h5><hr>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="mobile" class="col-md-4 col-form-label text-md-right">موبایل</label>

                            <div class="col-md-6">
                                <input id="mobile" type="mobile" class="form-control @error('mobile') is-invalid @enderror" 
                                name="mobile" value="{{ old('mobile') }}" required autocomplete="mobile" autofocus>

                                @error('mobile')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-right">رمز عبور</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" 
                                name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" 
                                    id="remember" {{ old('remember') ? 'checked' : '' }} style="float: right !important;">

                                    <label class="form-check-label" for="remember" style="margin-right: 20px;">
                                        مرا بخاطر بسپار
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                
                                <button type="submit" class="btn btn-primary">
                                    ورود
                                </button>
                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}" 
                                        style="text-decoration: none;">
                                        رمز عبور خود را فراموش کرده اید؟
                                    </a>
                                @endif                                 
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
