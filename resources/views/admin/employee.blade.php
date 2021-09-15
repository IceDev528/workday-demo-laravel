@extends('layouts.admin')

@section('meta')
    <title>Employee | Workday Time Clock</title>
    <meta name="description" content="Workday Employee">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Employee") }}

                <a href="{{ url('/admin/employee/add') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-plus"></i><span class="button-with-icon">{{ __("Add") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table width="100%" class="table datatables-table custom-table-ui" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th>{{ __('ID') }}</th> 
                        <th>{{ __('Employee') }}</th> 
                        <th>{{ __('Company') }}</th>
                        <th>{{ __('Department') }}</th>
                        <th>{{ __('Position') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($employees)
                    @foreach ($employees as $employee)
                        <tr>
                            <td>{{ $employee->idno }}</td>
                            <td>{{ $employee->lastname }}, {{ $employee->firstname }}</td>
                            <td>{{ $employee->company }}</td>
                            <td>{{ $employee->department }}</td>
                            <td>{{ $employee->jobposition }}</td>
                            <td><span class="text-uppercase">@if($employee->employmentstatus == 'Active') Active @else Archived @endif</span></td>
                            <td class="text-end">
                                <a href="{{ url('/admin/employee/view') }}/{{ $employee->reference }}" class="btn btn-outline-secondary btn-sm btn-rounded"><i class="fas fa-file-alt"></i></a>

                                <a href="{{ url('/admin/employee/edit') }}/{{ $employee->reference }}" class="btn btn-outline-secondary btn-sm btn-rounded"><i class="fas fa-pen"></i></a>

                                <a href="{{ url('/admin/employee/archive') }}/{{ $employee->reference }}" class="btn btn-outline-secondary btn-sm btn-rounded"><i class="fas fa-archive"></i></a>

                                <a href="{{ url('/admin/employee/delete') }}/{{ $employee->reference }}" class="btn btn-outline-secondary btn-sm btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    @endisset
                </tbody>
            </table>
            <!-- <small class="text-muted">{{ __("Only 250 recent records will be displayed use Date range filter to get more records") }}</small> -->
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('assets/js/initiate-datatables-with-search.js') }}"></script>
@endsection