@extends('Admin.layouts.master')

@section('title')
    | Settings
@endsection

@section('css')
@endsection

@section('page-name')
    Home
@endsection

@section('main-title')
    Settings
@endsection

@section('page-link')
    {{ route('admin.dashboard.index') }}
@endsection

@section('content')
    {{-- <div class="row">

        <div class="col-6"> --}}
            @error('value')
            <p class="text-danger">{{ $message }}</p>
        @enderror
        @foreach ($settings as $setting)
            <form class="row d-flex align-items-center" method="post" action="{{ route('admin.dashboard.settings.update', $setting) }}">
                @csrf
                @method('patch')
                <div class="card-body">

                    <div class="form-group col-7">
                        <label for="name">{{ $setting->key }}</label>
                        <input type="text" class="form-control" value="{{ $setting->value }}" id="name" name="value">

                    </div>
                </div>
                <div class="col-5">
                    <button type="submit" class="btn btn-info ">Update</button>
                </div>
            </form>
            {{-- {{ $setting->key }} :  {{ $setting->value }} <br> --}}
            <hr>
        @endforeach
    {{-- </div>
    </div> --}}
@endsection

@section('scripts')
@endsection
