@extends('layouts.webclock')

@section('meta')
    <title>Web clock | Workday Time Clock</title>
    <meta name="description" content="Workday weblock">
@endsection

@section('content')
    <div class="d-flex align-items-center flex-fill">
        <div class="container h-100 py-3 my-3">
            <div class="row h-100 justify-content-center align-items-center">
                <div class="col-sm-6 col-md-6 col-lg-6">
                    <div class="card border-0 shadow-sm my-3 overflow-hidden">
                        <div class="p-3 p-sm-3 p-md-4 p-lg-5">
                            <div class="text-center mt-3 mb-4">
                                <h1 class="fw-bolder text-primary">Workday</h1>
                            </div>

                            <div class="col-sm-12 my-auto mb-4 text-center">
                                <p  class="text-dark mt-4 mb-0 lead">
                                    <span id="current-day" class="text-capitalize"></span>, <spam id="current-date" class="text-capitalize"></spam>
                                </p>
                                <h1 id="current-time" class="display-4 fw-bold text-dark"></h1>
                            </div>

                            <form action="" method="get" autocomplete="off" class="col-md-8 m-auto">
                                <div class="mb-3 text-center">
                                    <label for="idno" class="lead form-label">{{ __("Enter Your ID Number") }}</label>
                                    <input type="text" name="idno" class="form-control text-uppercase" placeholder="" autofocus required>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="d-grid mb-3">
                                            <button id="btn-clockin" type="button" data-method="clockin" class="btn btn-success">
                                                {{ __("Clock IN") }}
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="d-grid mb-3">
                                            <button id="btn-clockout" type="button" data-method="clockout" class="btn btn-primary">
                                                {{ __("Clock OUT") }}
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- notification container -->
    <div class="position-fixed p-3 d-flex justify-content-center align-items-cente" style="z-index: 9; left: 0; right: 0; bottom: 0;">
        <div id="myToast" class="toast hide" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="true" data-bs-delay="5000">
          <div class="toast-header">
            <strong class="me-auto">{{ __("Notification!") }}</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
          </div>
          <div class="toast-body">
            <p> 
                <span id="greetings">{{ __("Welcome!") }}</span> 
                <span id="employee"></span>
            </p>
            <p>
                <span id="type"></span>
                <span id="message"></span> 
                <span id="time"></span>
            </p>
          </div>
        </div>
    </div>
@endsection

@section('scripts')
<script type="text/javascript">
    var url = '{{url("/")}}';
    var timezone = '@isset($timezone){{ $timezone }}@endisset';
    var timeformat = '@isset($timeformat){{ $timeformat }}@endisset';
    var lang_clockin = "{{ __('Clock In at') }}";
    var lang_clockout ="{{ __('Clock Out at') }}";
    
    var myToastEl = document.getElementById('myToast');
    var toast = new bootstrap.Toast(myToastEl);

    $('#btn-clockin, #btn-clockout').on('click', function(event) {
        event.preventDefault();
        var method = $(this).data("method");
        var idno = $('input[name="idno"]').val();
        idno.toUpperCase();

        $.ajax({
            url: url + '/webclock/clocking',
            type: 'post',
            dataType: 'json',
            data: { type: method, idno: idno, },
            headers: { 'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content') },

            success: function(response) {
                if (response['error'] != null) {
                    // clear old text
                    $('#type, #employee').text("").hide();
                    $('#time').html("").hide();

                    // insert new text
                    $('#message').text(response['error']);
                    $('#employee').text(response['employee']);

                    toast.show();

                } else {
                    function type(clocktype) {
                        if (clocktype == "clockin") {
                            return lang_clockin;
                        } else {
                            return lang_clockout;
                        }
                    }
                    // clear old text
                    $('#type, #employee, #message').text("").show();
                    $('#time').html("").show();

                    // insert new
                    $('#type').text(type(response['type']));
                    $('#employee').text(response['employee']);
                    $('#time').html('<span>' + response['time'] + '</span>' + '.' + '<span> {{ __("Success!") }}</span>');

                    toast.show();
                }
            },
        });

        $('input[name="idno"]').val("");
        $('input[name="idno"]').focus();
    });
</script>
<script src="{{ asset('/assets/js/real-time-clock.js') }}"></script>
@endsection