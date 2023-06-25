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
                    <h3 class="card-title text-success">Patient : {{ $examination->doctor_patient->patient->user->name }}
                    </h3>
                    <br>
                    <h3 class="card-title text-primary">Doctor : {{ $examination->doctor_patient->doctor->user->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="card">
                        <div class="card-body">
                            <p class="card-text"><span class="text-success">Title :</span> {{ $examination->title }}</p>
                            <p class="card-text"><span class="text-success">Description :</span>
                                {{ $examination->description }}</p>
                            <p class="card-text"><span class="text-success">Price :</span> {{ $examination->price }}</p>
                            <p class="card-text"><span class="text-success">Offer :</span> {{ $examination->offer }}%</p>
                            <p class="card-text"><span class="text-success">Status :</span> {{ $examination->status }}</p>
                            <p class="card-text"><span class="text-success">Time :</span> {{ $examination->time }}</p>
                            @if ($examination->file)
                                <a href="{{route('admin.dashboard.examinations.download', $examination)}}" class="card-link">File {{ $examination->file }}</a>
                            @endif
                            <a href="{{route('admin.dashboard.examinations.downloadPDF', $examination)}}" class="card-link">Download Details As PDF</a>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('scripts')
@endsection
