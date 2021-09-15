@extends('layouts.admin')

@section('meta')
    <title>User Accounts | Workday Time Clock</title>
    <meta name="description" content="Workday User Accounts">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("User Accounts") }}

                <a href="{{ url('export/report/accounts') }}" class="btn btn-outline-secondary btn-sm me-2 float-end">
                    <i class="fas fa-download"></i><span class="button-with-icon">{{ __("Export to CSV") }}</span>
                </a>

                <a href="{{ url('admin/reports') }}" class="btn btn-outline-primary btn-sm me-2 float-end">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table width="100%" class="table datatables-table" id="dataTables-example" data-order='[[ 0, "asc" ]]'>
                <thead>
                    <tr>
                        <th>{{ __("Employee Name") }}</th>
                        <th>{{ __("Email") }}</th>
                        <th>{{ __("Account Type") }}</th>
                        <th>{{ __("Status") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($users)
                        @foreach ($users as $data)
                            <tr>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>@if( $data->acc_type == 2) Admin @else Employee @endif</td>
                                <td>@if($data->status == 1) Active @endif @if($data->status == 0) Disabled @endif</td>
                            </tr>
                        @endforeach
                    @endisset
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script src="{{ asset('assets/js/initiate-datatables-with-search.js') }}"></script> 
@endsection