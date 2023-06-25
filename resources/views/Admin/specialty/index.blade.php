@extends('Admin.layouts.master')

@section('title')
    | Specialties
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
    Specialties
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Specialties</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead >
                            <tr>
                                <th class="text-center" style="width: 10px">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Image</th>
                                <th class="text-center">N.doctors</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($specialties as $specialty)
                                <tr>
                                    <td class="text-center">{{ $specialties->firstItem() + $loop->index }}</td>
                                    <td>{{ $specialty->name }}</td>
                                    <td class="text-center"><img width="200" src="{{ asset($specialty::UPLOAD_PATH  . ($specialty->image ?? 'default_image.png' ) ) }}"></td>
                                    <td class="text-center">{{ $specialty->doctors_count }}</td>
                                    <td class="text-center">

                                        <a href="{{ route('admin.dashboard.specialty.edit', $specialty) }}" class="btn btn-info">Edit</a>

                                        <form action="{{ route('admin.dashboard.specialty.destroy', $specialty) }}" method="post" class="d-inline">
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
                    {{ $specialties->links('vendor.pagination.card_pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
