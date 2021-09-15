@extends('layouts.admin')

@section('meta')
    <title>Employee Birthdays | Workday Time Clock</title>
    <meta name="description" content="Workday Employee Birthdays">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Employee Birthdays") }}

                <a href="{{ url('export/report/birthdays') }}" class="btn btn-outline-secondary btn-sm me-2 float-end">
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
                        <th>{{ __("Department") }}</th>
                        <th>{{ __("Position") }}</th>
                        <th>{{ __("Birthday") }}</th>
                        <th>{{ __("Contact Number") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($employee)
                        @foreach ($employee as $data)
                            <tr>
                                <td>{{ $data->lastname }}, {{ $data->firstname }} {{ $data->mi }}</td>
                                <td>{{ $data->department }}</td>
                                <td>{{ $data->jobposition }}</td>
                                <td>
                                @php  
                                    if($data->birthday != null) {
                                        echo e(date("D, M d Y", strtotime($data->birthday)));
                                    }
                                @endphp
                                </td>
                                <td>{{ $data->mobileno }}</td>
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