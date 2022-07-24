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

<hr>
    {{$dataTable->table()}}


@push('scripts')
    {{$dataTable->scripts()}}
@endpush

@endsection

@section('page-js')

 <script src="{{asset('assets/js/vendor/datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/datatables.script.js')}}"></script>

@endsection
