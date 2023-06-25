@extends('Admin.layouts.master')

@section('title')
    | Add Examination
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
    Add New Examination To : {{ $patient->user->name }}
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add New Examination</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('admin.dashboard.examinations.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="price">Price</label>
                            <input type="number" class="form-control" value="{{ old('price') }}" id="price"
                                name="price" placeholder="Enter Examination Price ...">
                            @error('price')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="offer">Offer</label>
                            <input type="number" class="form-control" value="{{ old('offer') }}" id="offer"
                                name="offer" placeholder="Enter Examination Offer ex (10 for 10%) ...">
                            @error('offer')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" value="{{ old('title') }}" id="title"
                                name="title" placeholder="Enter Examination Title ...">
                            @error('title')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="description">Examination Description</label>
                            <textarea class="form-control" name="description" id="description" rows="3"
                                placeholder="Enter Examination Description ...">{{ old('description') }}</textarea>
                            @error('description')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Date of Examination:</label>

                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">
                                        <i class="far fa-calendar-alt"></i>
                                    </span>
                                </div>
                                <input name="time" value="{{ old('time') }}" type="date"
                                    class="form-control float-right" id="reservation">
                            </div>
                            @error('time')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                            <!-- /.input group -->
                        </div>

                        <div class="form-group">
                            <label for="status">Examination Statue</label>
                            <select name="status" id="status" class="form-control">
                                <option selected>-- select examination status --</option>
                                <option value="pending">Pending</option>
                                <option value="success">Success</option>
                                <option value="cancelled">Cancelled</option>
                            </select>
                            @error('status')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Examination File ( pdf - image ) </label>
                            <div class="input-group">
                                <div class="custom-file">
                                    <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <div class="input-group-append">
                                    <span class="input-group-text">Upload</span>
                                </div>
                            </div>
                        </div>


                        <input type="hidden" name="patient_id" value="{{ $patient->id }}">

                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info">Add</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
