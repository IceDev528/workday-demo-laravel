@extends('layouts.auth')

@section('meta')
    <title>Reset Password</title>
    <meta name="description" content="Reset Password">
@endsection

@section('auth')
<div class="container">
    <div class="row justify-content-center">
        <div class="card col-md-6 auth-box">
            <div class="card-body">
                <div class="">
                    <!-- <img class="logo" src="" alt="application logo"> -->
                </div> 
                <h6 class="mb-4 text-center">{{ __('Reset Password') }}</h6>

                <form method="POST" action="{{ route('password.update') }}" class="needs-validation" autocomplete="off" novalidate>
                    @csrf
                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">

                    <div class="mb-3">
                        <label for="email" class="form-label">{{ __('Email') }}</label>
                        <input id="email" type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $request->email) }}" autofocus required>

                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" name="password" class="form-control @error('password') is-invalid @enderror" required>

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

                    <div class="mb-4 d-grid">
                      <button class="btn btn-primary" type="submit">{{ __('Reset Password') }}</button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>
</div>
@endsection
