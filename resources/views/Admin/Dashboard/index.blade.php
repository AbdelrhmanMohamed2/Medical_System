@extends('Admin.layouts.master')

@section('title')
 | Home
@endsection

@section('css')
@endsection

@section('page-name')
Home
@endsection

@section('main-title')
Home
@endsection

@section('page-link')
{{ route('admin.dashboard.index') }}
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
                <div class="inner">
                    <h3>44</h3>

                    <p>User Registrations</p>
                </div>
                <div class="icon">
                    <i class="ion ion-person-add"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
