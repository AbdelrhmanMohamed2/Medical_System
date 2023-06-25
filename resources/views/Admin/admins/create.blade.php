@extends('Admin.layouts.master')

@section('title')
    | Add Admin
@endsection

@section('css')
@endsection

@section('page-name')
    Admins
@endsection

@section('page-link')
    {{ route('admin.dashboard.admins.index') }}
@endsection

@section('main-title')
    Add New Admin
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Add New Admin</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form method="post" action="{{ route('admin.dashboard.admins.store') }}">
                    @csrf
                    <div class="card-body">

                        <div class="form-group">
                            <label for="name">Admin Name</label>
                            <input type="text" class="form-control" value="{{ old('name') }}" id="name"
                                name="name" placeholder="Enter Admin name ...">
                            @error('name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>



                        <div class="form-group">
                            <label for="phone">Admin Phone</label>
                            <input type="text" class="form-control" value="{{ old('phone') }}" id="phone"
                                name="phone" placeholder="Enter Admin phone ...">
                            @error('phone')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Admin Email</label>
                            <input type="email" class="form-control" value="{{ old('email') }}" id="email"
                                name="email" placeholder="Enter Admin email ...">
                            @error('email')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Admin Password</label>
                            <input type="password" class="form-control" id="password"
                                name="password" placeholder="Enter Admin password ...">
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
