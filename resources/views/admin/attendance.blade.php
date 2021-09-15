@extends('layouts.admin')

@section('meta')
    <title>Attendance | Workday Time Clock</title>
    <meta name="description" content="Workday Attendance">
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/airdatepicker/css/datepicker.min.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Attendance") }}

                <a href="{{ url('/admin/attendance/manual-entry') }}" target="_blank" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-plus"></i><span class="button-with-icon">{{ __("Manual Entry") }}</span>
                </a>
                <a href="{{ url('/webclock') }}" target="_blank" class="btn btn-outline-success btn-sm me-2 float-end">
                    <i class="fas fa-clock"></i><span class="button-with-icon">{{ __("Web Clock") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/attendance') }}" method="post" class="form-inline responsive-filter-form needs-validation mb-2" novalidate autocomplete="off" accept-charset="utf-8">
                @csrf
                <div class="col-md-12">
                  <div class="row g-1">
                    <div class="col-sm-2">
                        <select name="emp_id" class="form-select form-select-sm">
                            <option value="" disabled selected>{{ __('Employee') }}</option>
                            @isset($employee)
                                @foreach ($employee as $data)
                                    <option value="{{ $data->id }}">{{ $data->lastname }}, {{ $data->firstname }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>

                    <div class="col-sm-2">
                        <input name="start" type="text" class="airdatepicker form-control form-control-sm mr-1" value="" placeholder="{{ __('Start Date') }}" required>
                    </div>

                    <div class="col-sm-2 position-relative">
                        <input name="end" type="text" class="airdatepicker form-control form-control-sm mr-1" value="" placeholder="{{ __('End Date') }}" required>
                    </div>

                    <div class="col-sm-2">
                        <button type="submit" class="btn btn-outline-secondary btn-sm col-md-12">
                            <i class="fas fa-filter"></i><span class="button-with-icon">{{ __("Filter") }}</span>
                        </button>
                    </div>

                    <div class="col-sm-2">
                        <button type="button" id="btnTableExport" class="btn btn-outline-primary btn-sm col-md-12">
                            <i class="fas fa-file-export"></i><span class="button-with-icon">{{ __("Export to CSV") }}</span>
                        </button>
                    </div>
                </div>
            </div>
            </form>

            <table width="100%" id="tableExportToCSV" class="table datatables-table custom-table-ui" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th>{{ __('Date') }}</th>
                        <th>{{ __('Employee') }}</th>
                        <th>{{ __('Clock In') }}</th>
                        <th>{{ __('Clock Out') }}</th>
                        <th>{{ __('Total Hours') }}</th>
                        <th>{{ __('Status') }} ({{ __("In") }}/{{ __("Out") }})</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($attendance)
                    @foreach ($attendance as $data)
                    <tr>
                        <td>{{ $data->date }}</td>
                        <td>{{ $data->employee }}</td>
                        <td>
                            @php 
                                if($time_format == 12) {
                                    echo e(date('h:i:s A', strtotime($data->timein)));
                                } else {
                                    echo e(date('H:i:s', strtotime($data->timein)));
                                }
                            @endphp
                        </td>
                        <td>
                            @isset($data->timeout)
                                @php 
                                    if($time_format == 12) {
                                        echo e(date('h:i:s A', strtotime($data->timeout)));
                                    } else {
                                        echo e(date('H:i:s', strtotime($data->timeout)));
                                    }
                                @endphp
                            @endisset
                        </td>
                        <td>
                            @isset($data->totalhours)
                                @if($data->totalhours != null) 
                                    @php
                                        if(stripos($data->totalhours, ".") === false) {
                                            $h = $data->totalhours;
                                        } else {
                                            $HM = explode('.', $data->totalhours); 
                                            $h = $HM[0]; 
                                            $m = $HM[1];
                                        }
                                    @endphp
                                @endif

                                @if($data->totalhours != null)
                                    @if(stripos($data->totalhours, ".") === false) 
                                        {{ $h }} hr
                                    @else 
                                        {{ $h }} hr {{ $m }} mins
                                    @endif
                                @endif
                            @endisset
                        </td>
                        <td>
                            @if($data->status_timein !== null && $data->status_timeout !== null) 
                                <span class="@if($data->status_timein == 'Late In') text-warning @else text-primary @endif">{{ $data->status_timein }}</span> / 
                                <span class="@if($data->status_timeout == 'Early Out') text-danger @else text-success @endif">{{ $data->status_timeout }}</span> 
                            @elseif($data->status_timein == 'Late In') 
                                <span class="text-warning">{{ $data->status_timein }}</span>
                            @else 
                                <span class="text-primary">{{ $data->status_timein }}</span>
                            @endif 
                        </td>
                        <td class="text-end">
                            <a href="{{ url('/admin/attendance/delete') }}/{{ $data->id }}" class="btn btn-outline-secondary btn-sm btn-rounded"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>
            <small class="text-muted">{{ __("Only 250 recent records will be displayed use Date range filter to get more records") }}</small>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/validate-form.js') }}"></script>
    <script src="{{ asset('assets/js/initiate-datatables.js') }}"></script> 
    <script src="{{ asset('assets/vendor/airdatepicker/js/datepicker.min.js') }}"></script> 
    <script src="{{ asset('assets/vendor/airdatepicker/js/i18n/datepicker.en.js') }}"></script> 
    <script src="{{ asset('assets/js/initiate-airdatepicker.js') }}"></script>
    <script src="{{ asset('assets/js/table-export-csv.js') }}"></script>
@endsection