@extends('layouts.admin')

@section('meta')
    <title>Manage Leave Types | Workday Time Clock</title>
    <meta name="description" content="Workday Manage Leave Types">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Manage Leave Types") }}
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <form action="{{ url('admin/leavetype/add') }}" method="post" class="needs-validation" autocomplete="off" novalidate accept-charset="utf-8">
                        @csrf
                        <div class="mb-3">
                            <label for="leavetype" class="form-label">{{ __("Leave Name") }} <small class="text-muted">e.g. "Vacation Leave, Sick Leave"</small></label>
                            <input type="text" name="leavetype" value="" class="form-control text-uppercase" required>
                        </div>

                        <div class="mb-3">
                            <label for="credits" class="form-label">{{ __("Credits") }} <small class="text-muted">e.g. "15" (days)</small></label>
                            <input type="text" name="credits" value="" class="form-control text-uppercase" required>
                        </div>

                        <div class="mb-3">
                          <label for="term" class="form-label">{{ __("Terms") }}</label>
                          <select name="term" class="form-select" required>
                            <option value="" disabled selected>Choose...</option>
                            <option value="Monthly">{{ __("Monthly") }}</option>
                            <option value="Quarterly">{{ __("Quarterly") }}</option>
                            <option value="Yearly">{{ __("Yearly") }}</option>
                          </select>
                        </div>

                        <div class="mb-3 mb-0 text-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-check-circle"></i><span class="button-with-icon">{{ __("Save") }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <table width="100%" class="table datatables-table custom-table-ui" data-order='[[ 0, "desc" ]]'>
                        <thead>
                            <tr>
                                <th>{{ __("Description") }}</th>
                                <th>{{ __("Credits") }}</th>
                                <th>{{ __("Term") }}</th>
                                <th>{{ __("Actions") }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @isset($data)
                                @foreach ($data as $leavetype)
                                <tr>
                                    <td>{{ $leavetype->leavetype }}</td>
                                    <td>{{ $leavetype->limit }}</td>
                                    <td>{{ $leavetype->percalendar }}</td>
                                    <td class="text-end">
                                        <a href="{{ url('admin/leavetype/delete') }}/{{ $leavetype->id }}" class="btn btn-outline-secondary btn-sm btn-rounded">
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
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('assets/js/initiate-datatables-with-search.js') }}"></script> 
    <script src="{{ asset('/assets/js/validate-form.js') }}"></script>
@endsection