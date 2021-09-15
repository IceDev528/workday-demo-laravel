@extends('layouts.admin')

@section('meta')
    <title>Add New User Role | Workday Time Clock</title>
    <meta name="description" content="Workday Add New User Role">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Add New User Role") }}

                <a href="{{ url('/admin/user/roles') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('admin/user/roles/store') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="role_name" class="form-label">{{ __("Role Name") }}</label>
                    <input type="text" name="role_name" value="" class="form-control text-uppercase" required>
                </div>

                <div class="mb-3">
                  <label for="status" class="form-label">{{ __("Status") }}</label>
                  <select name="status" class="form-select" required>
                    <option value="" disabled selected>Choose...</option>
                    <option value="Active">{{ __("Active") }}</option>
                    <option value="Disabled">{{ __("Disabled") }}</option>
                  </select>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Save") }}</span>
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