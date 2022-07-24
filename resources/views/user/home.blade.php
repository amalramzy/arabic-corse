@extends('layouts.app')

@section('content')
<div class="auth-layout-wrap" style="background-image: url({{asset('assets/images/photo-wide-4.jpg')}})">
    <div class="auth-content">
        <div class="card o-hidden">
            <div class="row">
                <div class="col-md-12">
                    <div class="p-4 text-center">
                        <div class="auth-logo text-center mb-4">
                            <img src="{{asset('assets/images/logo.png')}}" alt="">
                        </div>
                        <h1 class="mb-3 text-18">Home Page</h1>
                        
                       
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>


@endsection
