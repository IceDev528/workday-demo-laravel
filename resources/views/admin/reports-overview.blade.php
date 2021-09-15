@extends('layouts.admin')

@section('meta')
    <title>Company Overview | Workday Time Clock</title>
    <meta name="description" content="Workday Company overview">
@endsection

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12 page-header">
            <h2 class="page-title">
                {{ __("Company Overview") }}

                <a href="{{ url('/admin/reports') }}" class="btn btn-outline-primary btn-sm float-end">
                    <i class="fas fa-arrow-left"></i><span class="button-with-icon">{{ __("Return") }}</span>
                </a>
            </h2>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">{{ __("Company Population") }}</div>
                <div class="card-body">
                     <canvas class="chart" id="company"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">{{ __("Department Population") }}</div>
                <div class="card-body">
                    <canvas class="chart" id="department"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">{{ __("Gender Demographics") }}</div>
                <div class="card-body">
                    <canvas class="chart" id="genderdiff"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">{{ __("Age Demographics") }}</div>
                <div class="card-body">
                    <canvas class="chart" id="age_group"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">{{ __("Civil Status Demographics") }}</div>
                <div class="card-body">
                    <canvas class="chart" id="civilstatus"></canvas>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card mb-4">
                <div class="card-header">{{ __("New Employees by Year") }}</div>
                <div class="card-body">
                    <canvas class="chart" id="yearhired"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('scripts')
    <script src="{{ asset('/assets/vendor/chartsjs/chart.min.js') }}"></script>
    <script type="text/javascript">
    var company = document.getElementById('company');
    var myChart0 = new Chart(company, {
        type: 'pie',
        data: {
            labels: [@isset($company_counts) @php foreach ($company_counts as $key => $value) { echo '"' . $key . '"' . ', '; } @endphp @endisset],
            datasets: [{
                label: 'Company',
                data: [@isset($company_stats){{ $company_stats }}@endisset],
                backgroundColor: ["#009688","#795548","#673AB7","#2196F3","#6da252","#f39c12","#F44336"],
                borderColor: ["#fff"],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                }
            },
        }
    });

    var department = document.getElementById('department');
    var myChart1 = new Chart(department, {
        type: 'pie',
        data: {
            labels: [@isset($departments_counts) @php foreach ($departments_counts as $key => $value) { echo '"' . $key . '"' . ', '; } @endphp @endisset],
            datasets: [{
                label: 'Department',
                data: [@isset($department_stats) {{ $department_stats }} @endisset],
                backgroundColor: ["#673AB7","#2196F3","#6da252","#f39c12","#F44336","#009688","#795548"],
                borderColor: ["#fff"],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                }
            },
        }
    });

    var genderdiff = document.getElementById('genderdiff');
    var myChart2 = new Chart(genderdiff, {
        type: 'pie',
        data: {
            labels: [@isset($genders_counts) @php foreach ($genders_counts as $key => $value) { echo '"' . $key . '"' . ', '; } @endphp @endisset],
            datasets: [{
                label: 'Gender',
                data: [@isset($gender_stats) {{ $gender_stats }} @endisset],
                backgroundColor: ["#6da252","#f39c12","#F44336","#009688","#673AB7","#2196F3","#795548"],
                borderColor: ["#fff"],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                }
            },
        }
    });

    var age_group = document.getElementById('age_group');
    var mychart3 = new Chart(age_group, {
        type: 'radar',
        data: {
            labels: ['Age 18-24', 'Age 25-31', 'Age 32-38', 'Age 39-45', 'Age 46-100+'],
            datasets: [{
                label: 'Headcount',
                data: [@isset($age_group) {{ $age_group }} @endisset ],
                backgroundColor : "rgba(48, 164, 255, 0.2)",
                borderColor : "rgba(48, 164, 255, 0.8)",
                pointBackgroundColor : "rgba(48, 164, 255, 1)",
                pointStrokeColor : "#fff",
                pointHighlightFill : "#fff",
                pointHighlightStroke : "rgba(48, 164, 255, 1)",
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                }
            },
        }
    });

    var civilstatus = document.getElementById('civilstatus');
    var myChart4 = new Chart(civilstatus, {
        type: 'doughnut',
        data: {
            labels: [@isset($civilstatus_counts) @php foreach ($civilstatus_counts as $key => $value) { echo '"' . $key . '"' . ', '; } @endphp @endisset],
            datasets: [{
                label: 'Civil Status',
                data: [@isset($civilstatus_stats) {{ $civilstatus_stats }} @endisset],
                backgroundColor: ["#F44336","#2196F3","#795548","#6da252","#f39c12","#009688","#673AB7"],
                borderColor: ["#fff"],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    display: true,
                    position: 'right',
                }
            },
        }
    });

    var yearhired = document.getElementById('yearhired');
    var myChart5 = new Chart(yearhired, {
        type: 'line',
        data: {
            labels: [@isset($year_hired_counts) @php foreach ($year_hired_counts as $key => $value) { echo '"' . $key . '"' . ', '; } @endphp @endisset],
            datasets: [{
                label: 'Employee Hired by Year',
                data: [@isset($year_hired_stats) {{ $year_hired_stats }} @endisset],
                backgroundColor:  "rgba(48, 164, 255, 0.2)",
                borderColor: "rgba(48, 164, 255, 0.8)",
                fill: true,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
              legend: {
                position: 'top',
              }
            }
        }
    });
    </script>
@endsection