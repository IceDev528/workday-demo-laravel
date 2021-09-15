@extends('layouts.admin')

@section('meta')
    <title>Users | Workday Time Clock</title>
    <meta name="description" content="Workday Users">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Users") }}

                <a href="{{ url('admin/users/add') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-plus"></i><span class="button-with-icon">{{ __("Add") }}</span>
                </a>

                <a href="{{ url('admin/user/roles') }}" class="btn btn-outline-success btn-sm me-2 float-end">
                    <i class="fas fa-users"></i><span class="button-with-icon">{{ __("Roles") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table width="100%" class="table datatables-table custom-table-ui" data-order='[[ 0, "desc" ]]'>
                <thead>
                    <tr>
                        <th>{{ __("Name") }}</th>
                        <th>{{ __("Email") }}</th>
                        <th>{{ __("Role") }}</th>
                        <th>{{ __("Type") }}</th>
                        <th>{{ __("Status") }}</th>
                        <th>{{ __("Actions") }}</th>
                    </tr>
                </thead>
                <tbody>
                    @isset($users_roles)
                    @foreach ($users_roles as $data)
                    <tr>
                        <td>{{ $data->name }}</td>
                        <td>{{ $data->email }}</td>
                        <td>{{ $data->role_name }}</td>
                        <td> @if($data->acc_type == 2) Admin @else Employee @endif </td>
                        <td>
                            @if($data->status == '1') 
                                Enabled
                            @else
                                Disabled
                            @endif
                        </td>
                        <td class="text-end">
                            <a href="{{ url('admin/users/edit') }}/{{ $data->id }}" class="btn btn-outline-secondary btn-sm btn-rounded"><i class="fas fa-pen"></i></a>
                            <a href="{{ url('admin/users/delete') }}/{{ $data->id }}" class="btn btn-outline-secondary btn-sm btn-rounded"><i class="fas fa-trash"></i></a>
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