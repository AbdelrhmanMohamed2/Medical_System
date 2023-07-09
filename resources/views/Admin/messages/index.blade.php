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
                    <h3 class="card-title">All Messages</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10px">#</th>
                                <th class="text-center">Sender Name</th>

                                <th class="text-center">Subject</th>

                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($messages as $message)
                                <tr>
                                    <td class="text-center">{{ $messages->firstItem() + $loop->index }}</td>
                                    <td class="text-center">{{ $message->name ?? $message->user->name }}</td>
                                    <td class="text-center">{{ $message->subject }}</td>
                                    <td class="text-center">
                                        <a href="{{ route('admin.dashboard.messages.show', $message) }}"
                                            class="btn btn-success">Details</a>
                                        <form action="{{ route('admin.dashboard.messages.destroy', $message) }}"
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
                    {{ $messages->links('vendor.pagination.card_pagination') }}
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('Admin/ajax/search.js') }}"></script>
@endsection
