@extends('Admin.layouts.master')

@section('title')
    | Home
@endsection

@section('css')
@endsection

@section('page-name')
    Home
@endsection

@section('main-title')
    Home
@endsection

@section('page-link')
    {{ route('admin.dashboard.index') }}
@endsection

@section('content')
    <div class="row">

        <div class="col-lg-3 col-6">

            <!-- small box -->
            <div class="small-box bg-success">
                <div class="inner">
                    <h3>{{ $patientCount }}</h3>

                    <p>Patients</p>
                </div>
                <div class="icon">
                    <i class="fa-solid fa-hospital-user"></i>
                </div>
                <a href="{{ route('admin.dashboard.patients.index') }}" class="small-box-footer">Show Patients <i
                        class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>

        @if (auth()->user()->type == 'Admin')
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $doctorCount }}</h3>

                        <p>Doctors</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user-doctor"></i>
                    </div>
                    <a href="{{ route('admin.dashboard.doctors.index') }}" class="small-box-footer">Show Doctors <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>

            </div>

            <div class="col-lg-3 col-6">

                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $adminCount }}</h3>

                        <p>Admins</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <a href="{{ route('admin.dashboard.admins.index') }}" class="small-box-footer">Show Admins <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <!-- small box -->
                <div class="small-box bg-primary">
                    <div class="inner">
                        <h3>{{ $specialtyCount }}</h3>

                        <p>Specialties</p>
                    </div>
                    <div class="icon">
                        <i class="fa-solid fa-hand-holding-medical"></i>
                    </div>
                    <a href="{{ route('admin.dashboard.specialty.index') }}" class="small-box-footer">Show Specialties <i
                            class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- DONUT CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        {{-- @dd($revenue[0]->total_price) --}}
                        <h3 class="card-title">Total Prices : {{ $revenue[0]->total_price }} </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="donutChart"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <!-- DONUT CHART -->
                <div class="card card-danger">
                    <div class="card-header">
                        {{-- @dd($revenue[0]->total_price) --}}
                        <h3 class="card-title">All Users : {{ $doctorCount + $patientCount + $adminCount }} </h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-tool" data-card-widget="remove">
                                <i class="fas fa-times"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="user"
                            style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>
        @endif
    </div>
@endsection

@section('scripts')
    <script>
        $(function() {
            var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
            var donutData = {
                labels: [
                    'Offer',
                    'Revinue',
                ],
                datasets: [{
                    data: [
                        {{ $revenue[0]->total_offer }},
                        {{ $revenue[0]->total_price - $revenue[0]->total_offer }},
                    ],
                    backgroundColor: [
                        '#f56954',
                        '#00a65a',
                    ],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })

        })

        $(function() {
            var donutChartCanvas = $('#user').get(0).getContext('2d')
            var donutData = {
                labels: [
                    'Doctors',
                    'Patients',
                    'Admins',
                ],
                datasets: [{
                    data: [
                        {{ $doctorCount }},
                        {{ $patientCount }},
                        {{ $adminCount }},
                    ],
                    backgroundColor: [
                        '#17a2b8',
                        '#28a745',
                        '#dc3545',
                    ],
                }]
            }
            var donutOptions = {
                maintainAspectRatio: false,
                responsive: true,
            }
            //Create pie or douhnut chart
            // You can switch between pie and douhnut using the method below.
            new Chart(donutChartCanvas, {
                type: 'doughnut',
                data: donutData,
                options: donutOptions
            })

        })
    </script>
@endsection
