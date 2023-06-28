@extends('Admin.layouts.master')

@section('title')
    | Show Patient
@endsection

@section('css')
@endsection

@section('page-name')
    Patients
@endsection

@section('page-link')
    {{ route('admin.dashboard.patients.index') }}
@endsection

@section('main-title')
    View Patient Details
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Patient : {{ $patient->user->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                <img class="profile-user-img img-fluid img-circle"
                                    src="{{ asset($patient::UPLOAD_PATH . ($patient->user->image ?? 'default_image.png')) }}"
                                    alt="User profile picture">
                            </div>

                            <h3 class="profile-username text-center">{{ $patient->user->name }}</h3>

                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- About Me Box -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Details</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <strong><i class="fa-solid fa-phone"></i> Phone</strong>
                            <p class="text-muted">
                                {{ $patient->user->phone }}
                            </p>
                            <hr>

                            <strong><i class="fa-solid fa-envelope"></i> Email</strong>
                            <p class="text-muted">
                                {{ $patient->user->email }}
                            </p>
                            <hr>


                            <strong><i class="fa-solid fa-calendar-days"></i> Birth Date</strong>
                            <p class="text-muted">
                                {{ $patient->birth_date }}
                            </p>
                            <hr>
                            <strong><i class="fa-solid fa-location-dot"></i> Address</strong>
                            <p class="text-muted">
                                {{ $patient->address }}
                            </p>
                            <hr>
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
    </div>
@endsection

@section('scripts')
@endsection
