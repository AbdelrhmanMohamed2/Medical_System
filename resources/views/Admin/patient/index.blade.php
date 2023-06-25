@extends('Admin.layouts.master')

@section('title')
    | Patients
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
    Patients
@endsection

@section('content')
@include('Admin.layouts.search')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Patients</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px">#</th>
                                <th class="text-center">Name</th>
                                {{-- <th class="text-center">N.examinations</th> --}}
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($patients as $patient)
                                <tr>
                                    <td class="text-center">{{ $patients->firstItem() + $loop->index }}</td>
                                    <td class="text-center">{{ $patient->user->name }}</td>
                                    {{-- <td class="text-center">{{ $patient->patient->examinations->count() }}</td> --}}
                                    <td class="text-center">
                                        <a href="{{ route('admin.dashboard.patients.show', $patient) }}"
                                            class="btn btn-success">Details</a>
                                            <a href="{{ route('admin.dashboard.examinations.index', $patient) }}"
                                            class="btn btn-warning">Show Examinations</a>
                                            <a href="{{ route('admin.dashboard.examinations.create', $patient) }}"
                                            class="btn btn-primary">Add Examination</a>
                                        <a href="{{ route('admin.dashboard.patients.edit', $patient) }}"
                                            class="btn btn-info">Edit</a>
                                        <form action="{{ route('admin.dashboard.patients.destroy', $patient) }}"
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
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $patients->links('vendor.pagination.card_pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
<script src="{{ asset('Admin/ajax/search.js') }}"></script>
@endsection
