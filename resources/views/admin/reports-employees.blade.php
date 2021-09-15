@extends('layouts.admin')

@section('meta')
    <title>Employee List | Workday Time Clock</title>
    <meta name="description" content="Workday Employee List">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Employee List") }}

                <a href="{{ url('export/report/employees') }}" class="btn btn-outline-secondary btn-sm me-2 float-end">
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
                        <th>{{ __("Age") }}</th>
                        <th>{{ __("Gender") }}</th>
                        <th>{{ __("Civil Status") }}</th>
                        <th>{{ __("Mobile Number") }}</th>
                        <th>{{ __("Email") }}</th>
                        <th>{{ __("Employment Type") }}</th>
                        <th>{{ __("Employment Status") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($employee)
                        @foreach ($employee as $data)
                            <tr>
                                <td>{{ $data->lastname }}, {{ $data->firstname }} {{ $data->mi }}</td>
                                <td>{{ $data->age }}</td>
                                <td>{{ $data->gender }}</td>
                                <td>{{ $data->civilstatus }}</td>
                                <td>{{ $data->mobileno }}</td>
                                <td>{{ $data->emailaddress }}</td>
                                <td>{{ $data->employmenttype }}</td>
                                <td>{{ $data->employmentstatus }}</td>
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