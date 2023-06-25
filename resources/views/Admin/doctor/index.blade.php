@extends('Admin.layouts.master')

@section('title')
    | Doctors
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
    Doctors
@endsection

@section('content')
@include('Admin.layouts.search')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Doctors</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px">#</th>
                                <th class="text-center">Name</th>
                                {{-- <th class="text-center">Phone</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Image</th> --}}
                                <th class="text-center">Specialty</th>
                                {{-- <th class="text-center">description</th>
                                <th class="text-center">N.patients</th> --}}
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($doctors as $doctor)
                                <tr>
                                    <td class="text-center">{{ $doctors->firstItem() + $loop->index }}</td>
                                    <td class="text-center">Dr/ {{ $doctor->user->name }}</td>
                                    {{-- <td>{{ $doctor->user->phone }}</td>
                                    <td>{{ $doctor->user->email ?? 'No Email Added' }}</td>
                                    <td class="text-center"><img width="200"
                                            src="{{ asset($doctor::UPLOAD_PATH  . ($doctor->user->image ?? 'default_doctor.png')) }}">
                                    </td> --}}
                                    <td class="text-center">{{ $doctor->specialty->name }}</td>
                                    {{-- <td>{{ $doctor->description }}</td>
                                    <td class="text-center">{{ $doctor->patients_count }}</td> --}}
                                    <td class="text-center">
                                        <a href="{{ route('admin.dashboard.doctors.show', $doctor) }}"
                                            class="btn btn-success">Details</a>
                                        <a href="{{ route('admin.dashboard.doctors.edit', $doctor) }}"
                                            class="btn btn-info">Edit</a>

                                        <form action="{{ route('admin.dashboard.doctors.destroy', $doctor) }}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>

                                    </td>
                                </tr>
                                {{-- @dd($doctor, $doctor->user) --}}
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $doctors->links('vendor.pagination.card_pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('Admin/ajax/search.js') }}"></script>
@endsection
