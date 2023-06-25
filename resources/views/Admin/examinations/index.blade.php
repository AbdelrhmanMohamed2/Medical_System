@extends('Admin.layouts.master')

@section('title')
    | Show Examinations
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
    View Patient Examinations
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
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px">#</th>
                                <th class="text-center">Title</th>
                                <th class="text-center">Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($examinations as $examination)
                                <tr>
                                    <td class="text-center">{{ $loop->iteration }}</td>
                                    <td class="text-center">{{ $examination->title }}</td>
                                    <td class="text-center">{{ $examination->status }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.dashboard.examinations.show', $examination) }}"
                                            class="btn btn-success">More Details</a>
                                        <a href="{{ route('admin.dashboard.examinations.edit', $examination) }}"
                                            class="btn btn-info">Edit</a>
                                        <form action="{{ route('admin.dashboard.examinations.destroy', $examination) }}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
