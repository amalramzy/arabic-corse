@extends('layouts.master')
@section('before-css')


@endsection

@section('main-content')
   <div class="breadcrumb">
              
    </div>
            <div class="row">
                <div class="embed-responsive embed-responsive-16by9">
                  <iframe class="embed-responsive-item" src="{{$video->link}}" allowfullscreen></iframe>

                    {{-- <iframe class="embed-responsive-item" src="{{$video->link}}" allowfullscreen></iframe> --}}
                  </div>
            </div>


@endsection

@section('page-js')




@endsection

@section('bottom-js')