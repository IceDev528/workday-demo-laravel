@extends('layouts.personal')

@section('meta')
    <title>My Profile | Workday Time Clock</title>
    <meta name="description" content="Workday My Profile">
@endsection

@section('content')

<div class="container">

    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("My Profile") }}
                <a href="{{ url('/personal/profile/edit') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-pen"></i><span class="button-with-icon">{{ __("Edit") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ __("Personal Information") }}</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>{{ __("Civil Status") }}</td>
                                <td class="fw-bolder">@isset($profile->civilstatus) {{ $profile->civilstatus }} @endisset</td>
                            </tr>
                            <tr>
                                <td>{{ __("Age") }}</td>
                                <td class="fw-bolder">@isset($profile->age) {{ $profile->age }} @endisset</td>
                            </tr>
                            <tr>
                                <td>{{ __("Gender") }}</td>
                                <td class="fw-bolder">@isset($profile->gender) {{ $profile->gender }} @endisset</td>
                            </tr>
                            <tr>
                                <td>{{ __("Date of Birth") }}</td>
                                <td class="fw-bolder">
                                    @isset($profile->birthday) 
                                        @php echo e(date("F d, Y", strtotime($profile->birthday))) @endphp
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __("Place of Birth") }}</td>
                                <td class="fw-bolder">@isset($profile->birthplace) {{ $profile->birthplace }} @endisset</td>
                            </tr>
                            <tr>
                                <td>{{ __("Home Address") }}</td>
                                <td class="fw-bolder">@isset($profile->homeaddress) {{ $profile->homeaddress }} @endisset</td>
                            </tr>
                            <tr>
                                <td>{{ __("National ID") }}</td>
                                <td class="fw-bolder">@isset($profile->nationalid) {{ $profile->nationalid }} @endisset</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <div class="col-md-4">
            <div class="card mb-3">
                <div class="card-header">{{ __("Details") }}</div>
                <div class="card-body">
                    <div class="text-center">
                        @if($profile_photo != null)
                            <img class="rounded-circle img-fluid img-thumbnail shadow-sm img-avatar-width" src="{{ asset('/assets/faces') }}/{{ $profile_photo }}" alt="profile photo"/>
                        @else
                            <img class="rounded-circle img-fluid img-thumbnail shadow-sm img-avatar-width" src="{{ asset('/assets/images/faces/default_user.jpg') }}" alt="profile photo"/>
                        @endif
                    </div>
                    <p>
                        <p class="lead text-center mb-0">@isset($profile->firstname) {{ $profile->firstname }} @endisset @isset($profile->lastname) {{ $profile->lastname }} @endisset</p>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td>{{ __("Email") }}</td>
                                    <td>@isset($profile->emailaddress) {{ $profile->emailaddress }} @endisset</td>
                                </tr>
                                <tr>
                                    <td>{{ __("Mobile") }} #</td>
                                    <td>@isset($profile->mobileno) {{ $profile->mobileno }} @endisset</td>
                                </tr>
                                <tr>
                                    <td>{{ __("ID") }} #</td>
                                    <td>@isset($company_data->idno) {{ $company_data->idno }} @endisset</td>
                                </tr>
                            </tbody>
                        </table>
                    </p>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-header">{{ __("Designation") }}</div>
                <div class="card-body">
                    <table class="table table-hover">
                        <tbody>
                            <tr>
                                <td>{{ __("Company") }}</td>
                                <td class="fw-bolder">@isset($company_data->company) {{ $company_data->company }} @endisset</td>
                            </tr>
                            <tr>
                                <td>{{ __("Department") }}</td>
                                <td class="fw-bolder">@isset($company_data->department) {{ $company_data->department }} @endisset</td>
                            </tr>
                            <tr>
                                <td>{{ __("Position") }}</td>
                                <td class="fw-bolder">@isset($company_data->jobposition) {{ $company_data->jobposition }} @endisset</td>
                            </tr>
                            <tr>
                                <td>{{ __("Leave Privileges") }}</td>
                                <td class="fw-bolder">
                                    @isset($leavetype)
                                        @isset($leavegroup) 
                                            @isset($company_data->leaveprivilege)
                                                @foreach($leavegroup as $lg)
                                                    @if($lg->id == $company_data->leaveprivilege)
                                                        @php
                                                            $lp = explode(",", $lg->leaveprivileges);
                                                        @endphp
                                                        @foreach($lp as $rights) 
                                                            @foreach($leavetype as $lt)
                                                                @if($lt->id == $rights) {{ $lt->leavetype }}, @endif
                                                            @endforeach
                                                        @endforeach
                                                    @endif
                                                @endforeach
                                            @endisset
                                        @endisset
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __("Employment Type") }}</td>
                                <td class="fw-bolder">@isset($profile->employmenttype) {{ $profile->employmenttype }} @endisset</td>
                            </tr>
                            <tr>
                                <td>{{ __("Employment Status") }}</td>
                                <td class="fw-bolder">@isset($profile->employmentstatus) {{ $profile->employmentstatus }} @endisset</td>
                            </tr>
                            <tr>
                                <td>{{ __("Official Start Date") }}</td>
                                <td class="fw-bolder">
                                    @isset($company_data->startdate) 
                                        @php echo e(date("F d, Y", strtotime($company_data->startdate))) @endphp
                                    @endisset
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __("Date of Regularization") }}</td>
                                <td class="fw-bolder">
                                    @isset($company_data->dateregularized) 
                                        @php echo e(date("F d, Y", strtotime($company_data->dateregularized))) @endphp
                                    @endisset
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
