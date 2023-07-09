@extends('Admin.layouts.master')

@section('title')
    | Messages
@endsection

@section('css')
@endsection

@section('page-name')
    Messages
@endsection

@section('page-link')
    {{ route('admin.dashboard.messages.index') }}
@endsection

@section('main-title')
    Messages
@endsection

@section('content')
    <div class="row">
        <div class="col-12">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Show Message</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center"> Name</th>
                                <th class="text-center"> Email</th>
                                <th class="text-center">Subject</th>
                                <th class="text-center">Content</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <th class="text-center">{{ $message->name ?? $message->user->name }}</th>
                            <th class="text-center">{{ $message->email ?? $message->user->email }}</th>
                            <th class="text-center">{{ $message->subject }}</th>
                            <th class="text-center">{{ $message->content }}</th>
                            <th class="text-center">
                                <form action="{{ route('admin.dashboard.messages.destroy', $message) }}" method="post"
                                    class="d-inline">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="btn btn-danger">
                                </form>
                            </th>
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('Admin/ajax/search.js') }}"></script>
@endsection
