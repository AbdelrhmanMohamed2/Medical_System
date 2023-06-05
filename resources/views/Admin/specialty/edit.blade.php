@extends('Admin.layouts.master')

@section('title')
    | Edit Speciality
@endsection

@section('css')
@endsection

@section('page-name')
    Specialties
@endsection

@section('page-link')
    {{ route('admin.dashboard.specialty.index') }}
@endsection

@section('main-title')
    Edit Speciality
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Edit Speciality : {{ $specialty->name }}</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('admin.dashboard.specialty.update', $specialty) }}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="card-body">
                        <div class="form-group">
                            <label for="name">Speciality Name</label>
                            <input type="text" class="form-control" value="{{ old('name') ?? $specialty->name }}" id="name"
                                name="name" placeholder="Enter speciality name ...">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <img src="{{ asset($specialty::UPLOAD_PATH  . $specialty->image) }}" width="200" class="img-thumbnail">
                        <div class="form-group">

                            <label for="exampleInputFile">File input</label>
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
