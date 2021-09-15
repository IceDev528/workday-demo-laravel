@extends('layouts.admin')

@section('meta')
    <title>Employee Profile | Workday Time Clock</title>
    <meta name="description" content="Workday Employee Profile">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Employee Profile") }}

                <a href="{{ url('/admin/employee') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <form action="" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
            <div class="card-header"></div>
            <div class="card-body">
                <p class="lead">{{ __("Personal Information") }}</p>
                <hr>
                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="firstname" class="form-label">{{ __("First Name") }}</label>
                        <input type="text" name="firstname" value="@isset($employee->firstname){{ $employee->firstname }}@endisset" class="form-control text-uppercase" readonly>
                    </div>
                    <div class="mb-3 col-md-2">
                        <label for="mi" class="form-label">{{ __("Middle Name") }}</label>
                        <input type="text" name="mi" value="@isset($employee->mi){{ $employee->mi }}@endisset" class="form-control text-uppercase" readonly>
                    </div>
                    <div class="mb-3 col-md-4">
                        <label for="lastname" class="form-label">{{ __("Last Name") }}</label>
                        <input type="text" name="lastname" value="@isset($employee->lastname){{ $employee->lastname }}@endisset" class="form-control text-uppercase" readonly>
                    </div>
                </div>

                <div class="mb-3">
                  <label for="gender" class="form-label">{{ __("Gender") }}</label>
                  <input type="text" name="gender" value="@isset($employee->gender){{ $employee->gender }}@endisset" class="form-control text-uppercase" readonly>
                </div>

                <div class="mb-3">
                  <label for="civilstatus" class="form-label">{{ __("Civil Status") }}</label>
                  <input type="text" name="civilstatus" value="@isset($employee->civilstatus){{ $employee->civilstatus }}@endisset" class="form-control text-uppercase" readonly>
                </div>

                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="emailaddress" class="form-label">{{ __("Email Address") }} <small class="text-muted">({{ __("Personal") }})</small></label>
                        <input type="email" name="emailaddress" value="@isset($employee->emailaddress){{ $employee->emailaddress }}@endisset" class="form-control text-uppercase" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="mobileno" class="form-label">{{ __("Mobile Number") }}</label>
                        <input type="text" name="mobileno" value="@isset($employee->mobileno){{ $employee->mobileno }}@endisset" class="form-control text-uppercase" readonly>
                    </div>
                </div>

                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="birthday" class="form-label">{{ __("Date of Birth") }}</label>
                        <input type="date" name="birthday" value="@isset($employee->birthday){{ $employee->birthday }}@endisset" class="form-control text-uppercase" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="age" class="form-label">{{ __("Age") }}</label>
                        <input type="text" name="age" value="@isset($employee->age){{ $employee->age }}@endisset" class="form-control text-uppercase" readonly>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="nationalid" class="form-label">{{ __("National ID") }}</label>
                    <input type="text" name="nationalid" value="@isset($employee->nationalid){{ $employee->nationalid }}@endisset" class="form-control text-uppercase" readonly>
                </div>

                <div class="mb-3">
                    <label for="birthplace" class="form-label">{{ __("Place of Birth") }}</label>
                    <input type="text" name="birthplace" value="@isset($employee->birthplace){{ $employee->birthplace }}@endisset" class="form-control text-uppercase" readonly>
                </div>

                <div class="mb-3">
                    <label for="homeaddress" class="form-label">{{ __("Home Address") }}</label>
                    <input type="text" name="homeaddress" value="@isset($employee->homeaddress){{ $employee->homeaddress }}@endisset" class="form-control text-uppercase" readonly>
                </div>

                <p class="lead mt-4">{{ __("Designation") }}</p>
                <hr>

                <div class="mb-3">
                  <label for="company" class="form-label">{{ __("Company") }}</label>
                  <input type="text" name="company" value="@isset($employee_data->company){{ $employee_data->company }}@endisset" class="form-control text-uppercase" readonly>
                </div>

                <div class="mb-3">
                  <label for="department" class="form-label">{{ __("Department") }}</label>
                  <input type="text" name="company" value="@isset($employee_data->company){{ $employee_data->company }}@endisset" class="form-control text-uppercase" readonly>
                </div>

                <div class="mb-3">
                  <label for="jobposition" class="form-label">{{ __("Job Title") }}</label>
                  <input type="text" name="jobposition" value="@isset($employee_data->jobposition){{ $employee_data->jobposition }}@endisset" class="form-control text-uppercase" readonly>
                </div>

                <div class="mb-3">
                    <label for="idno" class="form-label">{{ __("ID Number") }}</label>
                    <input type="text" name="idno" value="@isset($employee_data->idno){{ $employee_data->idno }}@endisset" class="form-control text-uppercase" readonly>
                </div>
                
                <div class="mb-3">
                    <label for="companyemail" class="form-label">{{ __('Email Address') }} <small class="text-muted">({{ __("Company") }})</small></label>
                    <input type="text" name="companyemail" value="@isset($employee_data->companyemail){{ $employee_data->companyemail }}@endisset" class="form-control text-uppercase" readonly>
                </div>

                <div class="mb-3">
                  <label for="leaveprivilege" class="form-label">{{ __("Leave Group") }} ID</label>
                  <input type="text" name="leaveprivilege" value="@isset($employee_data->leaveprivilege){{ $employee_data->leaveprivilege }}@endisset" class="form-control text-uppercase" readonly>
                </div>

                <p class="lead mt-4">{{ __("Employment Information") }}</p>
                <hr class="mt-0">

                <div class="mb-3">
                  <label for="employmenttype" class="form-label">{{ __("Employment Type") }}</label>
                  <input type="text" name="employmenttype" value="@isset($employee->employmenttype){{ $employee->employmenttype }}@endisset" class="form-control text-uppercase" readonly>
                </div>

                <div class="mb-3">
                  <label for="employmentstatus" class="form-label">{{ __("Employment Status") }}</label>
                  <input type="text" name="employmentstatus" value="@isset($employee->employmentstatus){{ $employee->employmentstatus }}@endisset" class="form-control text-uppercase" readonly>
                </div>

                <div class="row g-2">
                    <div class="mb-3 col-md-6">
                        <label for="startdate" class="form-label">{{ __("Official Start Date") }}</label>
                        <input type="text" name="startdate" value="@isset($employee_data->startdate){{ $employee_data->startdate }}@endisset" class="form-control text-uppercase" readonly>
                    </div>
                    <div class="mb-3 col-md-6">
                        <label for="dateregularized" class="form-label">{{ __("Date of Regularization") }}</label>
                        <input type="text" name="dateregularized" value="@isset($employee_data->dateregularized){{ $employee_data->dateregularized }}@endisset" class="form-control text-uppercase" readonly>
                    </div>
                </div>
            </div>
            <div class="card-footer text-right">
            </div>
        </form>
    </div>
</div>
@endsection

