@extends('layouts.admin')

@section('meta')
    <title>Add Leave Group | Workday Time Clock</title>
    <meta name="description" content="Workday Add Leave Group">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Add Leave Group") }}

                <a href="{{ url('/admin/leavegroups') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('admin/leavegroups/store') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <div class="mb-3">
                    <label for="leavegroup" class="form-label">{{ __("Leave Group Name") }}</label>
                    <input type="text" name="leavegroup" value="" class="form-control text-uppercase" required>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">{{ __("Description") }}</label>
                    <input type="text" name="description" value="" class="form-control text-uppercase" required>
                </div>

                <div class="mb-3">
                    <label for="leaveprivileges" class="form-label">{{ __('Leave Privileges') }}</label>
                    @isset($leavetypes)
                    <div class="row">
                    @foreach($leavetypes as $leave)
                        <div class="col-md-6">
                            <div class="form-check">
                              <input type="checkbox" name="leaveprivileges[]" value="{{ $leave->id }}" class="form-check-input" id="customCheck{{ $leave->id }}">
                              <label class="form-check-label" for="customCheck{{ $leave->id }}">{{ $leave->leavetype }}</label>
                            </div>
                        </div>
                    @endforeach
                    </div>
                    @endisset
                </div>
               
               <div class="mb-3">
                  <label for="status" class="form-label">{{ __("Status") }}</label>
                  <select name="status" class="form-select" required>
                    <option value="" disabled selected>Choose...</option>
                    <option value="1">{{ __("Active") }}</option>
                    <option value="0">{{ __("Disabled") }}</option>
                  </select>
                </div>
            </div>
            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Save") }}</span>
                </button>
                <a href="{{ url('/admin/leavegroups') }}" class="btn btn-secondary">
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