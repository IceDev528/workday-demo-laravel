@extends('layouts.auth')

@section('meta')
    <title>Confirm Password</title>
    <meta name="description" content="Confirm Password">
@endsection

@section('auth')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-6 auth-box">
            <div class="card-body">
                <div class="">
                    <!-- <img class="logo" src="" alt="application logo"> -->
                </div> 
                <h6 class="mb-4 text-center">{{ __('Confirm Password') }}</h6>
                <p>{{ __('This is a secure area of the application. Please confirm your password before continuing.') }}</p>

                <form method="POST" action="{{ route('password.confirm') }}" class="needs-validation" autocomplete="off" novalidate>
                    @csrf

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror"  required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="mb-4 d-grid">
                      <button class="btn btn-primary" type="submit">{{ __('Confirm') }}</button>
                    </div>
                </form>

                @if (Route::has('password.request'))
                    <p class="mb-0 text-center">{{ __('Forgot Your Password?') }}
                        <a href="{{ route('password.request') }}" class="btn btn-link text-secondary p-0 m-0 align-baseline">{{ __('Forgot Your Password?') }}</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
