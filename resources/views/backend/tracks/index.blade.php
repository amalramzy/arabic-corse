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
<div class="card-body">
    
    <form method="POST" action="{{ route('tracks.store') }}">
        @csrf
        <div class="form-group" for="name">{{ __('Create Track') }}</div>

        <div class="row">
            <div class="form-group col-6">
                <input type="text" name="name" id="name" class="form-control form-control-alternative @error('name') is-invalid @enderror" placeholder="{{ __('Add Name') }}" value="{{old('name')}}">
                
                @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
            <div class="form-group col-6">
                <button class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
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