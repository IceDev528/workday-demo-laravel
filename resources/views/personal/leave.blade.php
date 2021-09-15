@extends('layouts.personal')

@section('meta')
    <title>Leave | Workday Time Clock</title>
    <meta name="description" content="Workday Leave">
@endsection

@section('styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendor/airdatepicker/css/datepicker.min.css') }}">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Leave") }}
                <a href="{{ url('/personal/leave/add') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-plus"></i><span class="button-with-icon">{{ __("Request Leave") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('personal/leave') }}" method="post" class="form-inline responsive-filter-form needs-validation mb-2" novalidate autocomplete="off" accept-charset="utf-8">
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
                        <th>{{ __("Leave From") }}</th>
                        <th>{{ __("Leave Until") }}</th>
                        <th>{{ __("Leave Type") }}</th>
                        <th>{{ __("Reason") }}</th>
                        <th>{{ __("Return Date") }}</th>
                        <th>{{ __("Status") }}</th>
                        <th>{{ __("Actions") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($leave)
                    @foreach ($leave as $data)
                    <tr>
                        <td>{{ $data->leavefrom }}</td>
                        <td>{{ $data->leaveto }}</td>
                        <td>{{ $data->type }}</td>
                        <td>{{ $data->reason }}</td>
                        <td>{{ $data->returndate }}</td>
                        <td>{{ $data->status }}</td>
                        <td class="text-right">
                            @if($data->status == "Approved")
                                <a href="{{ url('/personal/leave/view') }}/{{ $data->id }}" class="btn btn-sm btn-outline-secondary btn-rounded"><i class="fas fa-file"></i></a>
                            @else
                                <a href="{{ url('/personal/leave/edit') }}/{{ $data->id }}" class="btn btn-sm btn-outline-secondary btn-rounded"><i class="fas fa-pen"></i></a>

                                <a href="{{ url('/personal/leave/delete') }}/{{ $data->id }}" class="btn btn-sm btn-outline-secondary btn-rounded"><i class="fas fa-trash"></i></a>
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