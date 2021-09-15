@extends('layouts.admin')

@section('meta')
    <title>Attendance Manual Entry | Workday Time Clock</title>
    <meta name="description" content="Workday Attendance Manual Entry">
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/airdatepicker/css/datepicker.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/mdtimepicker/mdtimepicker.min.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Manual Entry") }}

                <a href="{{ url('/admin/attendance') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('admin/attendance/add-entry') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="mb-3">
                  <label for="name" class="form-label">{{ __("Employee") }}</label>
                  <select name="name" class="form-select" required>
                    <option value="" disabled selected>Choose...</option>
                    @isset($employee)
                    @foreach ($employee as $data)
                        <option value="{{ $data->lastname }}, {{ $data->firstname }}" data-reference="{{ $data->id }}">{{ $data->lastname }}, {{ $data->firstname }}</option>
                    @endforeach
                    @endisset
                  </select>
                </div>

                <div class="mb-3">
                    <label for="date" class="form-label">{{ __("Date") }}</label>
                    <input type="text" name="date" value="" class="airdatepicker form-control" placeholder="YYYY-MM-DD" required>
                </div>

                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="clockin" class="form-label">{{ __("Clock IN") }} <small class="text-muted">({{ __("required") }})</small></label>
                        <input type="text" name="clockin" value="" class="timepicker form-control" placeholder="00:00 AM/PM" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="clockout" class="form-label">{{ __("Clock OUT") }} <small class="text-muted">({{ __("optional") }})</small></label>
                        <input type="text" name="clockout" value="" class="timepicker form-control" placeholder="00:00 AM/PM">
                    </div>
                </div>
                
            </div>
            <div class="card-footer text-end">
                <input type="hidden" value="" name="reference">
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Save") }}</span>
                </button>

                <a href="{{ url('/admin/attendance') }}" class="btn btn-secondary">
                    <i class="fas fa-times-circle"></i><span class="button-with-icon">{{ __("Cancel") }}</span>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
    <script src="{{ asset('/assets/js/get-employee-id.js') }}"></script>
    <script src="{{ asset('assets/vendor/airdatepicker/js/datepicker.min.js') }}"></script> 
    <script src="{{ asset('assets/vendor/airdatepicker/js/i18n/datepicker.en.js') }}"></script> 
    <script src="{{ asset('/assets/js/initiate-airdatepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/mdtimepicker/mdtimepicker.min.js') }}"></script> 
    <script src="{{ asset('/assets/js/initiate-timepicker.js') }}"></script>
@endsection