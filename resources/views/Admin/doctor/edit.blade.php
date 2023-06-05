@extends('Admin.layouts.master')

@section('title')
    | Edit Doctor
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
    Edit New Doctor
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit Doctor : {{ $doctor->user->name }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('admin.dashboard.doctors.update', $doctor) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Doctor Name</label>
                            <input type="text" class="form-control" value="{{ old('name') ?? $doctor->user->name }}" id="name"
                                name="name" placeholder="Enter Doctor name ...">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="specialty">Doctor Speciality</label>
                            <select name="specialty" id="specialty" class="form-control">
                                <option selected>-- select doctor specialty --</option>
                                @foreach ($specialties as $specialty)
                                    <option @selected((old('specialty') == $specialty->id) || ($doctor->specialty_id == $specialty->id)) value="{{ $specialty->id }}">{{ $specialty->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('specialty')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Doctor Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"
                                placeholder="Enter Doctor description ...">{{ old('description') ?? $doctor->description }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="phone">Doctor Phone</label>
                            <input type="text" class="form-control" value="{{ old('phone') ?? $doctor->user->phone }}" id="phone"
                                name="phone" placeholder="Enter Doctor phone ...">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Doctor Email</label>
                            <input type="email" class="form-control" value="{{ old('email') ?? $doctor->user->email }}" id="email"
                                name="email" placeholder="Enter Doctor email ...">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Change Doctor Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Enter Doctor password ...">
                            @error('password')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <input type="password" class="form-control" id="password" name="password_confirmation"
                                placeholder="Enter password again ...">
                            @error('password_confirmation')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <img src="{{ asset($doctor::UPLOAD_PATH  . ($doctor->user->image ?? 'default_doctor.png')) }}" width="200" class="img-thumbnail">


                        <div class="form-group">
                            <label for="exampleInputFile">Image</label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="image" class="custom-file-input" id="exampleInputFile">
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

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Edit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
