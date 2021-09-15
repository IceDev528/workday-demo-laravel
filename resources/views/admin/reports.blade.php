@extends('layouts.admin')

@section('meta')
    <title>Reports | Workday Time Clock</title>
    <meta name="description" content="Workday Reports">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Reports") }}
            </h2>
        </div>
    </div>

    <div class="card">
        <div class="card-body">
            <table width="100%" class="table datatables-table" data-order='[[ 0, "asc" ]]'>
                <thead>
                    <tr>
                        <th>{{ __('Report Name') }}</th>
                        <th>{{ __('Last Viewed') }}</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><a href="{{ url('admin/reports/employee-list') }}" class="text-decoration-none"><i class="fas fa-users"></i> {{ __('Employee List Report') }}</a></td>
                    <td>
                        @isset($lastviews)
                            @foreach ($lastviews as $views)
                                @if($views->report_id == 1)
                                    {{ $views->last_viewed }}
                                @endif
                            @endforeach
                        @endisset
                    </td>
                </tr>
                
                
                <tr>
                    <td><a href="{{ url('admin/reports/company-overview') }}" class="text-decoration-none"><i class="fas fa-chart-pie"></i> {{ __("Company Overview") }}</a></td>
                    <td>
                        @isset($lastviews)
                            @foreach ($lastviews as $views)
                                @if($views->report_id == 5)
                                    {{ $views->last_viewed }}
                                @endif
                            @endforeach
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td><a href="{{ url('admin/reports/employee-birthdays') }}" class="text-decoration-none"><i class="fas fa-birthday-cake"></i> {{ __('Employee Birthdays') }}</a></td>
                    <td>
                        @isset($lastviews)
                            @foreach ($lastviews as $views)
                                @if($views->report_id == 7)
                                    {{ $views->last_viewed }}
                                @endif
                            @endforeach
                        @endisset
                    </td>
                </tr>
                <tr>
                    <td><a href="{{ url('admin/reports/user-accounts') }}" class="text-decoration-none"><i class="fas fa-address-book"></i> {{ __('User Accounts Report') }}</a></td>
                    <td>
                        @isset($lastviews)
                            @foreach ($lastviews as $views)
                                @if($views->report_id == 6)
                                    {{ $views->last_viewed }}
                                @endif
                            @endforeach
                        @endisset
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('assets/js/initiate-datatables.js') }}"></script> 
@endsection