@extends('layouts.auth')

@section('meta')
    <title>Sign up</title>
    <meta name="description" content="Sign up">
@endsection

@section('auth')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-6 auth-box">
            <div class="card-body">
                <div class="">
                    <!-- <img class="logo" src="" alt="application logo"> -->
                </div>
                <h6 class="mb-4 text-center">Create new account</h6>
                <form method="POST" action="{{ route('register') }}" class="needs-validation" autocomplete="off" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">{{ __('Name') }}</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" autofocus required>

                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required>

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                
                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                    </div> 
                   
                    <!-- 
                    <div class="mb-3">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" name="confirm" class="custom-control-input" id="confirm-me">
                            <label class="custom-control-label" for="confirm-me">I agree to the <a href="#" tabindex="-1">terms and policy</a>.</label>
                        </div>
                    </div> 
                    -->
                    <div class="mb-4 d-grid">
                        <button class="btn btn-primary" type="submit">{{ __('Register') }}</button>
                    </div>
                </form>

                @if (Route::has('login'))
                    <p class="mb-0 text-center">
                        <a href="{{ route('login') }}" class="btn btn-link text-secondary p-0 m-0 align-baseline">{{ __('Already Registered?') }}</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
