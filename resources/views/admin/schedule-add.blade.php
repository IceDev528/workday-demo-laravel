@extends('layouts.admin')

@section('meta')
    <title>Add New Schedule | Workday Time Clock</title>
    <meta name="description" content="Workday Add New Schedule">
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
                {{ __("Add New Schedule") }}

                <a href="{{ url('/admin/schedule') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('admin/schedule/store') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="mb-3">
                  <label for="employee" class="form-label">{{ __("Employee") }}</label>
                  <select name="employee" class="form-control" required>
                    <option value="" disabled selected>Choose...</option>
                    @isset($employee)
                        @foreach ($employee as $data)
                            <option value="{{ $data->lastname }}, {{ $data->firstname }}" data-reference="{{ $data->id }}">{{ $data->lastname }}, {{ $data->firstname }}</option>
                        @endforeach
                    @endisset
                  </select>
                </div>

                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="intime" class="form-label">{{ __("Start Time") }}</label>
                        <input type="text" name="intime" value="" class="timepicker form-control" placeholder="00:00 AM/PM" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="outime" class="form-label">{{ __("Off Time") }}</label>
                        <input type="text" name="outime" value="" class="timepicker form-control" placeholder="00:00 AM/PM">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="datefrom" class="form-label">{{ __("From") }}</label>
                    <input type="text" name="datefrom" value="" class="airdatepicker form-control" placeholder="YYYY-MM-DD" required>
                </div>

                <div class="mb-3">
                    <label for="dateto" class="form-label">{{ __("Until") }}</label>
                    <input type="text" name="dateto" value="" class="airdatepicker form-control" placeholder="YYYY-MM-DD" required>
                </div>

                <div class="mb-3">
                    <label for="hours" class="form-label">{{ __("Total Hours") }}</label>
                    <input type="number" name="hours" value="" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="restdays" class="form-label">{{ __('Choose Rest Days') }}</label>

                    <div class="form-check">
                      <input type="checkbox" name="restday[]" value="Sunday" class="form-check-input" id="customCheck1">
                      <label class="form-check-label" for="customCheck1">{{ __("Sunday") }}</label>
                    </div>

                    <div class="form-check">
                      <input type="checkbox" name="restday[]" value="Monday" class="form-check-input" id="customCheck2">
                      <label class="form-check-label" for="customCheck2">{{ __("Monday") }}</label>
                    </div>

                    <div class="form-check">
                      <input type="checkbox" name="restday[]" value="Tuesday" class="form-check-input" id="customCheck3">
                      <label class="form-check-label" for="customCheck3">{{ __("Tuesday") }}</label>
                    </div>

                    <div class="form-check">
                      <input type="checkbox" name="restday[]" value="Wednesday" class="form-check-input" id="customCheck4">
                      <label class="form-check-label" for="customCheck4">{{ __("Wednesday") }}</label>
                    </div>

                    <div class="form-check">
                      <input type="checkbox" name="restday[]" value="Thursday" class="form-check-input" id="customCheck5">
                      <label class="form-check-label" for="customCheck5">{{ __("Thursday") }}</label>
                    </div>

                    <div class="form-check">
                      <input type="checkbox" name="restday[]" value="Friday" class="form-check-input" id="customCheck6">
                      <label class="form-check-label" for="customCheck6">{{ __("Friday") }}</label>
                    </div>

                    <div class="form-check">
                      <input type="checkbox" name="restday[]" value="Saturday" class="form-check-input" id="customCheck7">
                      <label class="form-check-label" for="customCheck7">{{ __("Saturday") }}</label>
                    </div>
                </div>
            </div>
            <div class="card-footer text-end">
                <input type="hidden" value="" name="reference">
                
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Save") }}</span>
                </button>

                <a href="{{ url('/admin/schedule') }}" class="btn btn-secondary">
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