@extends('Admin.layouts.master')

@section('title')
    | Admins
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
    Admins
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">All Admins</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px">#</th>
                                <th class="text-center">Name</th>
                                <th class="text-center">Email</th>
                                <th class="text-center">Phone</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($admins as $admin)
                                <tr>
                                    <td class="text-center">{{ $admins->firstItem() + $loop->index }}</td>
                                    <td class="text-center">{{ $admin->name }}</td>
                                    <td class="text-center">{{ $admin->email }}</td>
                                    <td class="text-center">{{ $admin->phone }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.dashboard.admins.edit', $admin->id) }}"
                                            class="btn btn-info">Edit</a>

                                        <form action="{{ route('admin.dashboard.admins.destroy', $admin->id) }}"
                                            method="post" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>

                                    </td>
                                </tr>
                                {{-- @dd($admin, $admin->user) --}}
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    {{ $admins->links('vendor.pagination.card_pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
