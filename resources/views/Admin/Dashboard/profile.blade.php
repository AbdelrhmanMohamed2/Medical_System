@extends('Admin.layouts.master')

@section('title')
    | Profile
@endsection

@section('css')
@endsection

@section('page-name')
    Home
@endsection

@section('main-title')
    Profile
@endsection

@section('page-link')
    {{ route('admin.dashboard.index') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">{{ $user->type }} : {{ $user->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <!-- Profile Image -->
                    <div class="card card-primary card-outline">
                        <div class="card-body box-profile">
                            <div class="text-center">
                                @if ($user->type == 'Doctor')
                                    <img class="profile-user-img img-fluid img-circle"
                                        src="{{ asset($user->doctor::UPLOAD_PATH . ($user->image ?? 'default_doctor.png')) }}"
                                        alt="User profile picture">
                                @endif
                            </div>

                            <h3 class="profile-username text-center">{{ $user->name }}</h3>
                            @if ($user->type == 'Doctor')
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>N. Patients</b> <a class="float-right">{{ $user->doctor->patients->count() }}
                                            Patients</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>N. Examination</b> <a
                                            class="float-right">{{ $user->doctor->examinations->count() }}
                                            Examination</a>
                                    </li>
                                </ul>
                                <form enctype="multipart/form-data" action="{{route('admin.dashboard.update-image')}}" method="post">
                                    @csrf
                                    @method('patch')

                                    <div class="form-group">
                                        <label for="exampleInputFile">Change Image </label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" name="image" class="custom-file-input"
                                                    id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-info">Update</button>
                                    </div>
                                </form>
                            @endif

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
                            @if ($user->type == 'Doctor')
                                <strong><i class="fas fa-book mr-1"></i> Specialty</strong>
                                <p class="text-muted">
                                    {{ $user->doctor->specialty->name }}
                                </p>
                                <hr>
                            @endif
                            <strong><i class="fa-regular fa-envelope"></i> Email</strong>
                            <p class="text-muted">
                                {{ $user->email }}
                            </p>
                            <hr>


                            <strong><i class="fa-solid fa-phone"></i> Phone</strong>
                            <p class="text-muted">
                                {{ $user->phone }}
                            </p>
                            <hr>
                            <form action="{{route('admin.dashboard.update-password')}}" method="post">
                                @csrf
                                @method('patch')

                                <div class="form-group">
                                    <label for="password">Change Password</label>
                                    <input type="password" class="form-control" id="password"
                                        name="password" placeholder="Enter New password ...">
                                    @error('password')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="password">Confirm Password</label>
                                    <input type="password" class="form-control" id="password"
                                        name="password_confirmation" placeholder="Enter password again ...">
                                    @error('password_confirmation')
                                        <p class="text-danger">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-info">Update</button>
                                </div>
                            </form>

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
