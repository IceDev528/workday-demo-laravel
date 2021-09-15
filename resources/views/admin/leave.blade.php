@extends('layouts.admin')

@section('meta')
    <title>Leave | Workday Time Clock</title>
    <meta name="description" content="Workday Leave">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Leave") }}
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('admin/leave') }}" method="post" class="form-inline responsive-filter-form needs-validation mb-2" novalidate autocomplete="off" accept-charset="utf-8">
                @csrf
                <div class="col-md-12">
                  <div class="row g-1">
                    <div class="col-sm-2">
                        <select name="emp_id" class="form-select form-select-sm" required>
                            <option value="" disabled selected>{{ __('Employee') }}</option>
                            @isset($employee)
                                @foreach ($employee as $data)
                                    <option value="{{ $data->id }}">{{ $data->lastname }}, {{ $data->firstname }}</option>
                                @endforeach
                            @endisset
                        </select>
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

            <table width="100%" class="table datatables-table custom-table-ui" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th>{{ __('Employee') }}</th>
                        <th>{{ __('Leave Type') }}</th>
                        <th>{{ __('Leave From') }}</th>
                        <th>{{ __('Leave Until') }}</th>
                        <th>{{ __('Return Date') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                   @isset($leaves)
                        @foreach ($leaves as $data)
                        <tr>
                            <td>{{ $data->employee }}</td>
                            <td>{{ $data->type }}</td>
                            <td>@php echo e(date('M d, Y', strtotime($data->leavefrom))) @endphp</td>
                            <td>@php echo e(date('M d, Y', strtotime($data->leaveto))) @endphp</td>
                            <td>@php echo e(date('M d, Y', strtotime($data->returndate))) @endphp</td>
                            <td>{{ $data->status }}</td>
                            <td class="text-end">
                                <a href="{{ url('admin/leave/edit') }}/{{ $data->id }}" class="btn btn-outline-secondary btn-sm btn-rounded"><i class="fas fa-pen"></i></a>

                                <a href="{{ url('admin/leave/delete') }}/{{ $data->id }}" class="btn btn-outline-secondary btn-sm btn-rounded"><i class="fas fa-trash"></i></a>
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
    <script src="{{ asset('assets/js/initiate-datatables.js') }}"></script> 
    <script src="{{ asset('assets/js/table-export-csv.js') }}"></script>
@endsection