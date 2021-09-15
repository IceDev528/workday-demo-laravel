@extends('layouts.personal')

@section('meta')
    <title>Request Leave | Workday Time Clock</title>
    <meta name="description" content="Workday Request Leave">
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/airdatepicker/css/datepicker.min.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Request Leave") }}
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('personal/leave/request') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="mb-3">
                  <label for="type" class="form-label">{{ __("Leave Type") }}</label>
                  <select name="type" class="form-select" required>
                    <option value="" disabled selected>Choose...</option>
                    @isset($leave_type)
                        @foreach ($leave_type as $data)
                            @foreach($leave_rights as $leave)
                                @if($leave == $data->id)
                                    <option value="{{ $data->leavetype }}" data-id="{{ $data->id }}">{{ $data->leavetype }}</option>
                                @endif
                            @endforeach
                        @endforeach
                    @endisset
                  </select>
                </div>

                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="leavefrom" class="form-label">{{ __("Leave From") }}</label>
                        <input type="text" name="leavefrom" value="" class="airdatepicker form-control" placeholder="YYYY-MM-DD" required>
                    </div>
                    <div class="mb-3 col-md-6" >
                        <label for="leaveto" class="form-label">{{ __("Leave Until") }}</label>
                        <input type="text" name="leaveto" value="" class="airdatepicker form-control" placeholder="YYYY-MM-DD" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="returndate" class="form-label">{{ __("Return Date") }}</label>
                    <input type="text" name="returndate" value="" class="airdatepicker form-control" placeholder="YYYY-MM-DD" required>
                </div>

                <div class="mb-3">
                    <label for="reason" class="form-label">{{ __("Reason") }}</label>
                    <textarea rows="5" name="reason" value="" class="form-control text-uppercase" required></textarea>
                </div>
            </div>
            <div class="card-footer text-end">
                <input type="hidden" name="typeid" value="">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Submit") }}</span>
                </button>
                <a href="{{ url('/personal/leave') }}" class="btn btn-secondary">
                    <i class="fas fa-times-circle"></i><span class="button-with-icon">{{ __("Cancel") }}</span>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('/assets/js/initiate-toast.js') }}"></script>
    <script src="{{ asset('/assets/js/get-leavetype-id.js') }}"></script>
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
    <script src="{{ asset('assets/vendor/airdatepicker/js/datepicker.min.js') }}"></script> 
    <script src="{{ asset('assets/vendor/airdatepicker/js/i18n/datepicker.en.js') }}"></script> 
    <script src="{{ asset('/assets/js/initiate-airdatepicker.js') }}"></script>
@endsection