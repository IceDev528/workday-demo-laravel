@extends('layouts.auth')

@section('meta')
    <title>Forgot Password</title>
    <meta name="description" content="Forgot Password">
@endsection

@section('auth')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-6 auth-box">
            <div class="card-body">
                <div class="">
                    <!-- <img class="logo" src="" alt="application logo"> -->
                </div>
                <h6 class="mb-4 text-center">Forgot your password? No problem. Just let us know your email address and we will email you a password reset link</h6>

                @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
                @endif

                <form method="POST" action="{{ route('password.email') }}" class="needs-validation" autocomplete="off" novalidate>
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autofocus required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-4 d-grid">
                        <button class="btn btn-primary" type="submit">{{ __('Email Password Reset Link') }}</button>
                    </div>
                </form>
  
                @if (Route::has('register'))
                    <p class="mb-0 text-center"> 
                        <a href="{{ route('register') }}" class="btn btn-link text-secondary p-0 m-0 align-baseline">Don't Have An Account?</a>
                    </p>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
