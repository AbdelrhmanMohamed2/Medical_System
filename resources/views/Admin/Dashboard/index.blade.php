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
        @endif
    </div>
@endsection

@section('scripts')
@endsection
