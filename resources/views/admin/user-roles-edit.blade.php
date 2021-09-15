@extends('layouts.admin')

@section('meta')
    <title>Edit User Role | Workday Time Clock</title>
    <meta name="description" content="Workday Edit User Role">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Edit User Role") }}

                <a href="{{ url('/admin/user/roles') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('admin/user/roles/update') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="role_name" class="form-label">{{ __("Role Name") }}</label>
                    <input type="text" name="role_name" value="@isset($role){{ $role->role_name }}@endisset" class="form-control text-uppercase" required>
                </div>

                <div class="mb-3">
                  <label for="status" class="form-label">{{ __("Status") }}</label>
                  <select name="status" class="form-select text-uppercase" required>
                    <option value="" disabled selected>Choose...</option>
                    <option value="Active" @isset($role) @if($role->status == "Active") selected @endif @endisset>{{ __("Active") }}</option>
                    <option value="Disabled" @isset($role) @if($role->status == "Disabled") selected @endif @endisset>{{ __("Disabled") }}</option>
                  </select>
                </div>

            </div>
            <div class="card-footer text-end">
                <input type="hidden" value="@isset($role){{ $role->id }}@endisset" name="ref">

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Update") }}</span>
                </button>

                <a href="{{ url('/admin/user/roles') }}" class="btn btn-secondary">
                    <i class="fas fa-times-circle"></i><span class="button-with-icon">{{ __("Cancel") }}</span>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
@endsection