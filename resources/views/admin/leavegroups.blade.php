@extends('layouts.admin')

@section('meta')
    <title>Manage Leave Groups | Workday Time Clock</title>
    <meta name="description" content="Workday Manage Leave Groups">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Manage Leave Groups") }}

                <a href="{{ url('admin/leavegroups/add') }}" class="btn btn-outline-primary btn-sm float-end">
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
                        <th>{{ __("Leave Group") }}</th>
                        <th>{{ __("Description") }}</th>
                        <th>{{ __("Privilege") }}</th>
                        <th>{{ __("Status") }}</th>
                        <th>{{ __("Actions") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($leavegroups) 
                        @foreach($leavegroups as $lg)
                        <tr>
                            <td>{{ $lg->leavegroup }}</td>
                            <td>{{ $lg->description }}</td>
                            <td>
                                @isset($leavetypes)
                                    @foreach($leavetypes as $lt) 
                                        @php
                                            $leavegroup = explode(",",$lg->leaveprivileges);
                                            foreach ($leavegroup as $value) 
                                            {
                                                if($value == $lt->id)
                                                {
                                                    echo $lt->leavetype.", ";
                                                }
                                            }
                                        @endphp
                                    @endforeach
                                @endisset
                            </td>
                            <td>@if($lg->status == 1) Active @else Disabled @endif</td>
                            <td class="text-end">
                                <a href="{{ url('admin/leavegroups/edit') }}/{{ $lg->id }}" class="btn btn-outline-secondary btn-sm btn-rounded"><i class="fas fa-pen"></i></a>

                                <a href="{{ url('admin/leavegroups/delete') }}/{{ $lg->id }}" class="btn btn-outline-secondary btn-sm btn-rounded"><i class="fas fa-trash"></i></a>
                            </td>
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