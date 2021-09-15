@extends('layouts.admin')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>{{ __("Permission Denied") }}</h2>
            <p>{{ __("Sorry, you don't have permission to access the page") }}.</p>
        </div>
    </div>
</div>
@endsection
