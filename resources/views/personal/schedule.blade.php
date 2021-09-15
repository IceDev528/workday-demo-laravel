@extends('layouts.personal')

@section('meta')
    <title>Schedule | Workday Time Clock</title>
    <meta name="description" content="Workday Schedule">
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/airdatepicker/css/datepicker.min.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Schedule") }}
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('personal/schedule') }}" method="post" class="needs-validation" novalidate autocomplete="off" accept-charset="utf-8">
                @csrf
                <div class="col-md-12">
                  <div class="row g-1">
                      <div class="col-sm-2">
                        <input name="start" type="text" class="airdatepicker form-control form-control-sm mr-1" value="" placeholder="{{ __('Start Date') }}" required>
                      </div>

                      <div class="col-sm-2">
                        <input name="end" type="text" class="airdatepicker form-control form-control-sm mr-1" value="" placeholder="{{ __('End Date') }}" required>
                      </div>

                      <div class="col-sm-2">
                        <button class="btn btn-outline-secondary btn-sm">
                            <i class="fas fa-filter"></i><span class="button-with-icon">{{ __("Filter") }}</span>
                        </button>
                      </div>
                  </div>
                </div>
            </form>

            <table width="100%" class="table datatables-table custom-table-ui" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th>{{ __("From") }}</th>
                        <th>{{ __("Until") }}</th>
                        <th>{{ __("Start Time") }}</th>
                        <th>{{ __("Off Time") }}</th>
                        <th>{{ __("Total Hours") }}</th>
                        <th>{{ __("Rest Days") }}</th>
                        <th>{{ __("Status") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($schedule)
                        @foreach ($schedule as $data)
                        <tr>
                            <td>
                                @php 
                                    echo e(date('Y-m-d',strtotime($data->datefrom)));
                                @endphp 
                            </td>
                            <td>
                                @php 
                                    echo e(date('Y-m-d',strtotime($data->dateto)));
                                @endphp
                            </td>
                            <td>
                                @php
                                    if($time_format == 12) {
                                        echo e($data->intime);
                                    } else {
                                        echo e(date("H:i", strtotime($data->intime)));     
                                    }
                                @endphp
                            </td>
                            <td>
                                @php
                                    if($time_format == 12) {
                                        echo e($data->outime);
                                    } else {
                                        echo e(date("H:i", strtotime($data->outime))); 
                                    }
                                @endphp
                            </td>
                            <td>{{ $data->hours }} hours</td>
                            <td>{{ $data->restday }}</td>
                            <td>
                                @if($data->archive == '0') 
                                    <span class="text-success">{{ __("Active") }}</span>
                                @else
                                    <span class="text-info">{{ __("Archive") }}</span>
                                @endif
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
    <script src="{{ asset('assets/js/initiate-datatables.js') }}"></script> 
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
    <script src="{{ asset('assets/vendor/airdatepicker/js/datepicker.min.js') }}"></script> 
    <script src="{{ asset('assets/vendor/airdatepicker/js/i18n/datepicker.en.js') }}"></script> 
    <script src="{{ asset('/assets/js/initiate-airdatepicker.js') }}"></script>
@endsection