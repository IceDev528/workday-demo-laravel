@extends('layouts.personal')

@section('meta')
    <title>Dashboard | Workday Time Clock</title>
    <meta name="description" content="Workday Dashboard">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Dashboard") }}
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-4">
            <div class="info-box">
                <span class="info-box-icon bg-primary"><i class="fas fa-clock"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text"><span class="uppercase">{{ __("Attendance") }}</span> <small class="text-muted">({{ __("Current Month") }})</small></span>
                    <div class="progress-group">
                        <div class="progress sm">
                            <div class="progress-bar bg-primary" style="width: 100%"></div>
                        </div>
                        <div class="stats_d">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td>{{ __("Late Ins") }}</td>
                                        <td><small class="fw-bolder">@isset($attendance_late_count){{ $attendance_late_count }}@endisset</small></td>
                                    </tr>
                                    <tr>
                                        <td>{{ __("Early Outs") }}</td>
                                        <td><small class="fw-bolder">@isset($attendance_early_out_count){{ $attendance_early_out_count }}@endisset</small></td>
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
                <span class="info-box-icon bg-success"><i class="fas fa-calendar-alt"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">{{ __("Present Schedule") }}</span>
                    <div class="progress-group">
                        <div class="progress sm">
                            <div class="progress-bar bg-success" style="width: 100%"></div>
                        </div>
                        <div class="stats_d">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td>{{ __("Time") }}</td>
                                        <td>
                                            <small class="fw-bolder">
                                                @isset($current_schedule)
                                                    @php
                                                    if ($current_schedule->intime != null && $current_schedule->outime != null) {
                                                        if ($time_format == 12) {
                                                            echo e(date("h:i A", strtotime($current_schedule->intime)));
                                                            echo e(" - ");
                                                            echo e(date("h:i A", strtotime($current_schedule->outime)));
                                                        } else {
                                                            echo e(date("H:i", strtotime($current_schedule->intime)));
                                                            echo e(" - ");
                                                            echo e(date("H:i", strtotime($current_schedule->outime)));
                                                        }
                                                    }
                                                    @endphp
                                                @endisset
                                            </small>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>{{ __("Rest Days") }}</td>
                                        <td><small class="fw-bolder">@isset($current_schedule->restday){{ $current_schedule->restday }}@endisset</small></td>
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
                    <span class="info-box-text uppercase">{{ __("Leaves of Absence") }}</span>
                    <div class="progress-group">
                        <div class="progress sm">
                            <div class="progress-bar bg-warning" style="width: 100%"></div>
                        </div>
                        <div class="stats_d">
                            <table style="width: 100%;">
                                <tbody>
                                    <tr>
                                        <td>{{ __("Approved") }} </td>
                                        <td><small class="fw-bolder">@isset($leaves_approved_count){{ $leaves_approved_count }}@endisset</small></td>
                                    </tr>
                                    <tr>
                                        <td>{{ __("Pending") }} </td>
                                        <td><small class="fw-bolder">@isset($leaves_pending_count){{ $leaves_pending_count }}@endisset</small></td>
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
                <div class="card-header">
                    {{ __("Recent Attendances") }}
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="text-left">{{ __("Date") }}</th>
                            <th class="text-left">{{ __("Time") }}</th>
                            <th class="text-left">{{ __("Type") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($recent_attendance)
                        @foreach($recent_attendance as $v)

                        @if($v->timein != null && $v->timeout == null)
                        <tr>
                            <td>
                                @php echo e(date('M d, Y', strtotime($v->date))); @endphp
                            </td>
                            <td>
                                @php
                                    if($time_format == 12) {
                                        echo e(date("h:i:s A", strtotime($v->timein)));
                                    } else {
                                        echo e(date("H:i:s", strtotime($v->timein)));
                                    }
                                @endphp
                            </td>
                            <td>Clock-In</td>
                        </tr>
                        @endif
                        
                        @if($v->timein != null && $v->timeout != null)
                        <tr>
                            <td>
                                @php echo e(date('M d, Y', strtotime($v->date))); @endphp
                            </td>
                            <td>
                                @php
                                    if($time_format == 12) {
                                        echo e(date("h:i:s A", strtotime($v->timeout)));
                                    } else {
                                        echo e(date("H:i:s", strtotime($v->timeout)));
                                    }
                                @endphp
                            </td>
                            <td>Clock-Out</td>
                        </tr>
                        @endif

                        @if($v->timein != null && $v->timeout != null)
                        <tr>
                            <td>
                                @php echo e(date('M d, Y', strtotime($v->date))); @endphp
                            </td>
                            <td>
                                @php
                                    if($time_format == 12) {
                                        echo e(date("h:i:s A", strtotime($v->timein)));
                                    } else {
                                        echo e(date("H:i:s", strtotime($v->timein)));
                                    }
                                @endphp
                            </td>
                            <td>Clock-In</td>
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
                <div class="card-header">{{ __("Previous Schedules") }}</div>
                <div class="card-body">
                <table class="table table-striped nobordertop">
                    <thead>
                        <tr>
                            <th class="text-left">{{ __("Time") }}</th>
                            <th class="text-left">{{ __("From") }} / {{ __("Until") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($previous_schedules)
                        @foreach($previous_schedules as $s)
                        <tr>
                            <td>
                                @php
                                    if ($s->intime != null && $s->outime != null) {
                                        if ($time_format == 12) {
                                            echo e(date("h:i A", strtotime($s->intime)));
                                            echo e(" - ");
                                            echo e(date("h:i A", strtotime($s->outime)));
                                        } else {
                                            echo e(date("H:i", strtotime($s->intime)));
                                            echo e(" - ");
                                            echo e(date("H:i", strtotime($s->outime)));
                                        }
                                    }
                                @endphp
                            </td>
                            <td>
                                @php 
                                    echo e(date('M d',strtotime($s->datefrom)).' - '.date('M d, Y',strtotime($s->dateto)));
                                @endphp
                            </td>
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
                <div class="card-header">{{ __("Recent Leaves of Absence") }}</div>
                <div class="card-body">
                <table class="table table-striped nobordertop">
                    <thead>
                        <tr>
                            <th class="text-left">{{ __("Description") }}</th>
                            <th class="text-left">{{ __("Date") }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @isset($recent_approved_leaves)
                        @foreach($recent_approved_leaves as $l)
                        <tr>
                            <td>{{ $l->type }}</td>
                            <td>
                                @php
                                    $fd = date('M', strtotime($l->leavefrom));
                                    $td = date('M', strtotime($l->leaveto));

                                    if($fd == $td)
                                    {
                                        $var = date('M d', strtotime($l->leavefrom)) .' - '. date('d, Y', strtotime($l->leaveto));
                                    } else {
                                        $var = date('M d', strtotime($l->leavefrom)) .' - '. date('M d, Y', strtotime($l->leaveto));
                                    }
                                @endphp
                                {{ $var }}
                            </td>
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

@section('scripts')

@endsection