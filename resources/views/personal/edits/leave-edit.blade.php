@extends('layouts.personal')

@section('meta')
    <title>Edit Leave | Workday Time Clock</title>
    <meta name="description" content="Workday Edit Leave">
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/airdatepicker/css/datepicker.min.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Edit Leave") }}
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('personal/leave/update') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="mb-3">
                  <label for="type" class="form-label">{{ __("Leave Type") }}</label>
                  <select name="type" class="form-select" required>
                    <option selected>Choose...</option>
                    @isset($leave_type))
                    @foreach ($leave_type as $data)
                        <option value="{{ $data->leavetype }}" @if($data->leavetype == $type) selected @endif>{{ $data->leavetype }}</option>
                    @endforeach
                    @endisset
                  </select>
                </div>

                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="leavefrom" class="form-label">{{ __("Leave from") }}</label>
                        <input type="text" name="leavefrom" value="@isset($leave->leavefrom){{ $leave->leavefrom }}@endisset" class="airdatepicker form-control" placeholder="YYYY-MM-DD" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="leaveto" class="form-label">{{ __("Leave until") }}</label>
                        <input type="text" name="leaveto" value="@isset($leave->leaveto){{ $leave->leaveto }}@endisset" class="airdatepicker form-control" placeholder="YYYY-MM-DD" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="returndate" class="form-label">{{ __("Return date") }}</label>
                    <input type="text" name="returndate" value="@isset($leave->returndate){{ $leave->returndate }}@endisset" class="airdatepicker form-control" placeholder="YYYY-MM-DD" required>
                </div>

                <div class="mb-3">
                    <label for="reason" class="form-label">{{ __("Reason") }}</label>
                    <textarea rows="5" name="reason" value="@isset($leave->reason){{ $leave->reason }}@endisset" class="form-control text-uppercase" required>@isset($leave->reason){{ $leave->reason }}@endisset</textarea>
                </div>
            </div>
            <div class="card-footer text-end">
                <input type="hidden" name="id" value="@isset($employee_id){{ $employee_id }}@endisset">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Update") }}</span>
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
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
    <script src="{{ asset('assets/vendor/airdatepicker/js/datepicker.min.js') }}"></script> 
    <script src="{{ asset('assets/vendor/airdatepicker/js/i18n/datepicker.en.js') }}"></script> 
    <script src="{{ asset('/assets/js/initiate-airdatepicker.js') }}"></script>
@endsection