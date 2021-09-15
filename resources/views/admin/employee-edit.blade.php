@extends('layouts.admin')

@section('meta')
    <title>Edit Employee Profile | Workday Time Clock</title>
    <meta name="description" content="Workday Edit Employee Profile">
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/airdatepicker/css/datepicker.min.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Edit Employee Profile") }}

                <a href="{{ url('/admin/employee') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="{{ url('admin/employee/update') }}" method="post" class="needs-validation" autocomplete="off" novalidate enctype="multipart/form-data" accept-charset="utf-8">
            @csrf
            <div class="card-header"></div>
            <div class="card-body">
                <p class="lead">{{ __("Personal Information") }}</p>
                <hr>
                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="firstname" class="form-label">{{ __("First Name") }}</label>
                        <input type="text" name="firstname" value="@isset($employee->firstname){{ $employee->firstname }}@endisset" class="form-control text-uppercase" required>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label for="mi" class="form-label">{{ __("Middle Name") }}</label>
                        <input type="text" name="mi" value="@isset($employee->mi){{ $employee->mi }}@endisset" class="form-control text-uppercase">
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="lastname" class="form-label">{{ __("Last Name") }}</label>
                        <input type="text" name="lastname" value="@isset($employee->lastname){{ $employee->lastname }}@endisset" class="form-control text-uppercase" required>
                    </div>
                </div>

                <div class="mb-3">
                  <label for="gender" class="form-label">{{ __("Gender") }}</label>
                  <select name="gender" class="form-select text-uppercase">
                    <option value="" disabled selected>Choose...</option>
                    <option value="MALE" @isset($employee->gender) @if($employee->gender == 'MALE') selected @endif @endisset>{{ __("MALE") }}</option>
                    <option value="FEMALE" @isset($employee->gender) @if($employee->gender == 'FEMALE') selected @endif @endisset>{{ __("FEMALE") }}</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="civilstatus" class="form-label">{{ __("Civil Status") }}</label>
                  <select name="civilstatus" class="form-select text-uppercase">
                    <option value="" disabled selected>Choose...</option>
                    <option value="SINGLE" @isset($employee->civilstatus) @if($employee->civilstatus == 'SINGLE') selected @endif @endisset>{{ __("SINGLE") }}</option>
                    <option value="MARRIED" @isset($employee->civilstatus) @if($employee->civilstatus == 'MARRIED') selected @endif @endisset>{{ __("MARRIED") }}</option>
                    <option value="ANNULLED" @isset($employee->civilstatus) @if($employee->civilstatus == 'ANNULLED') selected @endif @endisset>{{ __("ANNULLED") }}</option>
                    <option value="WIDOWED" @isset($employee->civilstatus) @if($employee->civilstatus == 'WIDOWED') selected @endif @endisset>{{ __("WIDOWED") }}</option>
                    <option value="LEGALLY SEPARATED" @isset($employee->civilstatus) @if($employee->civilstatus == 'LEGALLY SEPARATED') selected @endif @endisset>{{ __("LEGALLY SEPARATED") }}</option>
                  </select>
                </div>

                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="emailaddress" class="form-label">{{ __("Email Address") }} <small class="text-muted">({{ __("Personal") }})</small></label>
                        <input type="email" name="emailaddress" value="@isset($employee->emailaddress){{ $employee->emailaddress }}@endisset" class="form-control text-lowercase" required>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="mobileno" class="form-label">{{ __("Mobile Number") }}</label>
                        <input type="text" name="mobileno" value="@isset($employee->mobileno){{ $employee->mobileno }}@endisset" class="form-control text-uppercase">
                    </div>
                </div>

                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="birthday" class="form-label">{{ __("Date of Birth") }}</label>
                        <input type="text" name="birthday" value="@isset($employee->birthday){{ $employee->birthday }}@endisset" class="airdatepicker form-control text-uppercase" placeholder="YYYY-MM-DD">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="age" class="form-label">{{ __("Age") }}</label>
                        <input type="text" name="age" value="@isset($employee->age){{ $employee->age }}@endisset" class="form-control text-uppercase">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nationalid" class="form-label">{{ __("National ID") }}</label>
                    <input type="text" name="nationalid" value="@isset($employee->nationalid){{ $employee->nationalid }}@endisset" class="form-control text-uppercase">
                </div>

                <div class="mb-3">
                    <label for="birthplace" class="form-label">{{ __("Place of Birth") }}</label>
                    <input type="text" name="birthplace" value="@isset($employee->birthplace){{ $employee->birthplace }}@endisset" class="form-control text-uppercase">
                </div>

                <div class="mb-3">
                    <label for="homeaddress" class="form-label">{{ __("Home Address") }}</label>
                    <input type="text" name="homeaddress" value="@isset($employee->homeaddress){{ $employee->homeaddress }}@endisset" class="form-control text-uppercase">
                </div>

                <div class="mb-3">
                    <label for="imagefile" class="form-label">{{ __("Upload Profile photo") }}</label>
                    <input class="form-control text-uppercase" type="file" name="image" id="imagefile" accept="image/png, image/jpeg, image/jpg">
                </div>

                <p class="lead mt-4">{{ __("Designation") }}</p>
                <hr>

                <div class="mb-3">
                  <label for="company" class="form-label">{{ __("Company") }}</label>
                  <select name="company" class="form-select text-uppercase">
                    <option value="" disabled selected>Choose...</option>
                    @isset($company)
                        @foreach ($company as $data)
                            <option value="{{ $data->company }}" @if($data->company == $employee_data->company) selected @endif> {{ $data->company }}</option>
                        @endforeach
                    @endisset
                  </select>
                </div>

                <div class="mb-3">
                  <label for="department" class="form-label">{{ __("Department") }}</label>
                  <select name="department" class="form-select text-uppercase">
                    <option value="" disabled selected>Choose...</option>
                    @isset($department)
                        @foreach ($department as $data)
                            <option value="{{ $data->department }}" @if($data->department == $employee_data->department) selected @endif> {{ $data->department }}</option>
                        @endforeach
                    @endisset
                  </select>
                </div>

                <div class="mb-3">
                  <label for="jobtitle" class="form-label">{{ __("Job Title") }}</label>
                  <select name="jobtitle" class="form-select text-uppercase">
                    <option value="" disabled selected>Choose...</option>
                    @isset($jobtitle)
                        @foreach ($jobtitle as $data)
                            <option value="{{ $data->jobtitle }}" @if($data->jobtitle == $employee_data->jobposition) selected @endif> {{ $data->jobtitle }}</option>
                        @endforeach
                    @endisset
                  </select>
                </div>
                
                <div class="mb-3">
                    <label for="idno" class="form-label">{{ __("ID Number") }}</label>
                    <input type="text" name="idno" value="@isset($employee_data->idno){{ $employee_data->idno }}@endisset" class="form-control text-uppercase" required>
                </div>
                
                <div class="mb-3">
                    <label for="companyemail" class="form-label">{{ __('Email Address') }} <small class="text-muted">({{ __("Company") }})</small></label>
                    <input type="text" name="companyemail" value="@isset($employee_data->companyemail){{ $employee_data->companyemail }}@endisset" class="form-control text-lowercase">
                </div>

                <div class="mb-3">
                  <label for="leaveprivilege" class="form-label">{{ __("Leave Group") }}</label>
                  <select name="leaveprivilege" class="form-select text-uppercase">
                    <option value="" disabled selected>Choose...</option>
                    @isset($leavegroup) 
                        @foreach($leavegroup as $lg)
                            <option value="{{ $lg->id }}" @isset($employee_data->leaveprivilege) @if($lg->id == $employee_data->leaveprivilege) selected @endif @endisset>{{ $lg->leavegroup }}</option>
                        @endforeach
                    @endisset
                  </select>
                </div>

                <p class="lead mt-4">{{ __("Employment Information") }}</p>
                <hr class="mt-0">

                <div class="mb-3">
                  <label for="employmenttype" class="form-label">{{ __("Employment Type") }}</label>
                  <select name="employmenttype" class="form-select text-uppercase" required>
                    <option value="" disabled selected>Choose...</option>
                    <option value="Regular" @isset($employee->employmenttype) @if($employee->employmenttype == "Regular") selected @endif @endisset>{{ __("Regular") }}</option>
                    <option value="Trainee" @isset($employee->employmenttype) @if($employee->employmenttype == "Trainee") selected @endif @endisset>{{ __("Trainee") }}</option>
                  </select>
                </div>

                <div class="mb-3">
                  <label for="employmentstatus" class="form-label">{{ __("Employment Status") }}</label>
                  <select name="employmentstatus" class="form-select text-uppercase" required>
                    <option value="" disabled selected>Choose...</option>
                    <option value="Active" @isset($employee->employmentstatus) @if($employee->employmentstatus == "Active") selected @endif @endisset>{{ __("Active") }}</option>
                    <option value="Archived" @isset($employee->employmentstatus) @if($employee->employmentstatus == "Archived") selected @endif @endisset>{{ __("Archived") }}</option>
                  </select>
                </div>

                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="startdate" class="form-label">{{ __("Official Start Date") }}</label>
                        <input type="text" name="startdate" value="@isset($employee_data->startdate){{ $employee_data->startdate }}@endisset" class="airdatepicker form-control text-uppercase" placeholder="YYYY-MM-DD" data-position="top left">
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="dateregularized" class="form-label">{{ __("Date of Regularization") }}</label>
                        <input type="text" name="dateregularized" value="@isset($employee_data->dateregularized){{ $employee_data->dateregularized }}@endisset" class="airdatepicker form-control text-uppercase" placeholder="YYYY-MM-DD" data-position="top left">
                    </div>
                </div>

            </div>
            <div class="card-footer text-end">
                <input type="hidden" name="id" value="@isset($employee->id){{ $employee->id }}@endisset">
                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Update") }}</span>
                </button>
                <a href="{{ url('/admin/employee') }}" class="btn btn-secondary">
                    <i class="fas fa-times-circle"></i><span class="button-with-icon">{{ __("Cancel") }}</span>
                </a>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
    <script src="{{ asset('assets/vendor/airdatepicker/js/datepicker.min.js') }}"></script> 
    <script src="{{ asset('assets/vendor/airdatepicker/js/i18n/datepicker.en.js') }}"></script> 
    <script src="{{ asset('/assets/js/initiate-airdatepicker.js') }}"></script>
    <script src="{{ asset('/assets/vendor/bootstrap-custom-file-input/bs-custom-file-input.min.js') }}"></script>
    <script src="{{ asset('/assets/js/initiate-bootstrap-custom-file-input.js') }}"></script>
@endsection
