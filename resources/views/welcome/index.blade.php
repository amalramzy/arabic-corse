@extends('layouts.app')

@section('content')
@include('includes.picture')
@auth
    @include('includes.mycourses')
@endauth
@auth
    @include('includes.trackfamous')
@endauth
@endsection
