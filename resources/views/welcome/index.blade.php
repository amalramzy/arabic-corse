@extends('layouts.app')

@section('content')
@include('includes.picture')

@auth
    @include('includes.mycourses')
@endauth

    @include('includes.trackfamous')

@endsection
