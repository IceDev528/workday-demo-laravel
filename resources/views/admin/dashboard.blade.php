@extends('layouts.admin')

@section('meta')
    <title>Dashboard | Workday Time Clock</title>
    <meta name="description" content="Workday Dashboard">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fas fa-user-circle"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text uppercase">{{ __('Employees') }}</span>
                    <div class="progress-group">
                        <div class="progress sm">
                            <div class="progress-bar bg-primary" style="width: 100%"></div>
                        </div>
                        <div class="stats_d">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td>{{ __('Regular') }}</td>
                                        <td>@isset($employee_regular) {{ $employee_regular }} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Trainee') }}</td>
                                        <td>@isset($employee_trainee) {{ $employee_trainee }} @endisset</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-clock"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __('Attendances') }}</span>
                    <div class="progress-group">
                        <div class="progress sm">
                            <div class="progress-bar bg-success" style="width: 100%"></div>
                        </div>
                        <div class="stats_d">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td>{{ __('Online') }}</td>
                                        <td>@isset($is_online_now) {{ $is_online_now }} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Offline') }}</td>
                                        <td>@isset($is_offline_now) {{ $is_offline_now }} @endisset</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-warning"><i class="fas fa-calendar-plus"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text uppercase">{{ __('Leaves of Absence') }}</span>
                    <div class="progress-group">
                        <div class="progress sm">
                            <div class="progress-bar bg-warning" style="width: 100%"></div>
                        </div>
                        <div class="stats_d">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td>{{ __('Approved') }}</td>
                                        <td>@isset($employee_leaves_approved_count) {{ $employee_leaves_approved_count }} @endisset</td>
                                    </tr>
                                    <tr>
                                        <td>{{ __('Pending') }}</td>
                                        <td>@isset($employee_leaves_pending_count) {{ $employee_leaves_pending_count }} @endisset</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card mb-3">
                <div class="card-header">{{ __("Newest Employees") }}</div>
                <div class="card-body">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Start Date') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($recent_employees)
                            @foreach ($recent_employees as $data)
                            <tr>
                                <td>{{ $data->lastname }}, {{ $data->firstname }}</td>
                                <td>@php echo e(date('M d, Y', strtotime($data->startdate))) @endphp</td>
                            </tr>
                            @endforeach
                        @endisset
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card mb-3">
                <div class="card-header">{{ __("Recent Attendances") }}</div>
                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Type') }}</th>
                                <th>{{ __('Time') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($recent_attendance)
                                @foreach($recent_attendance as $v)
                                @if($v->timein != null && $v->timeout == null)
                                <tr>
                                    <td>{{ $v->employee }}</td>
                                    <td>Clock-In</td>
                                    <td>
                                        @php
                                            if($time_format == 12) {
                                                echo e(date('h:i:s A', strtotime($v->timein))); 
                                            } else {
                                                echo e(date('H:i:s', strtotime($v->timein))); 
                                            }
                                        @endphp
                                    </td>
                                </tr>
                                @endif
                                
                                @if($v->timein != null && $v->timeout != null)
                                <tr>
                                    <td>{{ $v->employee }}</td>
                                    <td>Clock-Out</td>
                                    <td>
                                        @php
                                            if($time_format == 12) {
                                                echo e(date('h:i:s A', strtotime($v->timeout))); 
                                            } else {
                                                echo e(date('H:i:s', strtotime($v->timeout))); 
                                            }
                                        @endphp
                                    </td>
                                </tr>
                                @endif

                                @if($v->timein != null && $v->timeout != null)
                                <tr>
                                    <td>{{ $v->employee }}</td>
                                    <td>Clock-In</td>
                                    <td>
                                        @php
                                            if($time_format == 12) {
                                                echo e(date('h:i:s A', strtotime($v->timein))); 
                                            } else {
                                                echo e(date('H:i:s', strtotime($v->timein))); 
                                            }
                                        @endphp
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            @endisset
                        </tbody>
                    </table>                
                </div>
            </div>
        </div>
        
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="card mb-3">
                <div class="card-header">{{ __("Recent Leaves of Absence") }}</div>
                <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Date') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($recent_leaves)
                            @foreach ($recent_leaves as $leaves)
                            <tr>
                                <td>{{ $leaves->employee }}</td>
                                <td>@php echo e(date('M d, Y', strtotime($leaves->leavefrom))) @endphp</td>
                            </tr>
                            @endforeach
                        @endisset
                    </tbody>
                </table>          
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection

