@extends('layouts.personal')

@section('meta')
    <title>My Account | Workday Time Clock</title>
    <meta name="description" content="Workday My Account">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("My Account") }}
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h3>{{ __("Profile") }}</h3>
                    <p>{{ __("Your name and email address are your identity on Workday and is used to login") }}</p>
                </div>
                <div class="col-md-6">
                    <form action="{{ url('personal/update/user') }}" method="post" class="needs-validation" novalidate autocomplete="off" accept-charset="utf-8">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">{{ __("Name") }}</label>
                            <input type="text" name="name" value="@isset($myuser->name){{ $myuser->name }}@endisset" placeholder="Name" class="form-control text-uppercase" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">{{ __("Email address") }}</label>
                            <input type="email" name="email" value="@isset($myuser->email){{ $myuser->email }}@endisset" placeholder="Email Address" class="form-control text-lowercase" required>
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Update Profile") }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <br>
            <br>
            <div class="line"></div>
            <br>
            <br>
            <div class="row">
                <div class="col-md-4">
                    <h3>{{ __("Password") }}</h3>
                    <p>{{ __("Changing your password will also reset your API key") }}</p>
                </div>
                <div class="col-md-6">
                    <form action="{{ url('personal/update/password') }}" method="post" class="needs-validation" novalidate autocomplete="off" accept-charset="utf-8">
                        @csrf
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __("Current Password") }}</label>
                            <input type="password" name="currentpassword" placeholder="Current Password" class="form-control" required>
                        </div>

                        <div class="line"></div><br>
                        <div class="mb-3">
                            <label for="password" class="form-label">{{ __("New Password") }}</label>
                            <input type="password" name="newpassword" placeholder="Enter a new password" class="form-control" required>
                            <small class="form-text">{{ __("Password must be 6 or more characters") }}</small>
                        </div>

                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">{{ __("Confirm New Password") }}</label>
                            <input type="password" name="confirmpassword" placeholder="Enter the password again" class="form-control" required>
                        </div>

                        <div class="mb-3 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Change Password") }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            <br>

        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
    <script src="{{ asset('/assets/js/initiate-toast.js') }}"></script>
@endsection