@extends('layouts.auth')

@section('meta')
    <title>Log in | Workday Time Clock</title>
    <meta name="description" content="Workday Log in">
@endsection

@section('auth')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-6 auth-box">
            <div class="card-body">
                <div class="logo text-center pt-4">
                    <h1 class="text-primary display-4 fw-bolder">Workday</h1>
                </div> 
                <h6 class="mb-4 text-center">{{ __("Log in to your account") }}</h6>
                <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('E-Mail Address') }}</label>
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email' )}}" autofocus required>

                         @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" value="" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <div class="form-check">
                          <input id="remember" class="form-check-input" type="checkbox" name="remember" value="">
                          <label class="form-check-label" for="remember">
                            {{ __('Remember me') }}
                          </label>
                        </div>
                    </div>

                    <div class="mb-4 d-grid">
                      <button class="btn btn-primary" type="submit">{{ __('Log in') }}</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
