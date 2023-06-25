@extends('Admin.layouts.master')

@section('title')
    | Show Doctor
@endsection

@section('css')
@endsection

@section('page-name')
    Doctors
@endsection

@section('page-link')
    {{ route('admin.dashboard.doctors.index') }}
@endsection

@section('main-title')
    View Doctor Details
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Doctor : {{ $doctor->user->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                        <!-- Profile Image -->
                        <div class="card card-primary card-outline">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset($doctor::UPLOAD_PATH  .( $doctor->user->image  ?? 'default_doctor.png')) }}" alt="User profile picture">
                                </div>

                                <h3 class="profile-username text-center">{{ $doctor->user->name }}</h3>

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>N. Patients</b> <a class="float-right">{{ $doctor->patients->count() }} Patients</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>N. Examination</b> <a class="float-right">{{ $doctor->examinations->count() }} Examination</a>
                                    </li>
                                </ul>

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- About Me Box -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">More Details</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <strong><i class="fas fa-book mr-1"></i> Specialty</strong>
                                <p class="text-muted">
                                    {{ $doctor->specialty->name }}
                                </p>
                                <hr>

                                <strong><i class="fa-regular fa-envelope"></i> Email</strong>
                                <p class="text-muted">
                                    {{ $doctor->user->email }}
                                </p>
                                <hr>


                                <strong><i class="fa-solid fa-phone"></i> Phone</strong>
                                <p class="text-muted">
                                    {{ $doctor->user->phone }}
                                </p>
                                <hr>

                                <strong><i class="far fa-file-alt mr-1"></i> Desctiption</strong>
                                <p class="text-muted">{{ $doctor->description }}</p>
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
