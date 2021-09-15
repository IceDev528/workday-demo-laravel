@extends('layouts.admin')

@section('meta')
    <title>User Roles | Workday Time Clock</title>
    <meta name="description" content="Workday User Roles">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("User Roles") }}

                <a href="{{ url('admin/user/roles/add') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-plus"></i><span class="button-with-icon">{{ __("Add") }}</span>
                </a>

                <a href="{{ url('/admin/users') }}" class="btn btn-outline-primary btn-sm float-end me-2">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table width="100%" class="table datatables-table custom-table-ui" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th>{{ __("Role Name") }}</th>
                        <th>{{ __("Status") }}</th>
                        <th>{{ __("Actions") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($roles)
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->role_name }}</td>
                            <td>{{ $role->status }}</td>
                            <td class="text-end">
                                <a href="{{ url('/admin/user/roles/permission/edit') }}/{{ $role->id }}" class="btn btn-outline-secondary btn-sm btn-rounded">
                                    <i class="fas fa-tasks"></i>
                                </a>

                                <a href="{{ url('/admin/user/roles/edit') }}/{{ $role->id }}" class="btn btn-outline-secondary btn-sm btn-rounded">
                                    <i class="fas fa-pen"></i>
                                </a>

                                <a href="{{ url('/admin/user/roles/delete') }}/{{ $role->id }}" class="btn btn-outline-secondary btn-sm btn-rounded">
                                    <i class="fas fa-trash"></i>
                                </a>
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
    <script src="{{ asset('assets/js/initiate-datatables.js') }}"></script> 
@endsection