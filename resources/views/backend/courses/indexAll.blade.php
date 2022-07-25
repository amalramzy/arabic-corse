@extends('layouts.master')
@section('page-css')

<link rel="stylesheet" href="{{asset('assets/styles/vendor/datatables.min.css')}}">
@endsection

@section('main-content')

@if (Session::has('message'))
<div class="alert alert-success">
    {{Session::get('message')}}
</div>
@endif

<div>
    <a class="btn btn-icon btn-primary btn-create" href="{{route('courses.create')}}">
        <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
        <span class="btn-inner--text">Add Course</span>
    </a>
</div>

    {{$dataTable->table()}}


@push('scripts')
    {{$dataTable->scripts()}}
@endpush

@endsection

@section('page-js')

 <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>

@endsection