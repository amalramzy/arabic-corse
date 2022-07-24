@extends('layouts.master')
@section('before-css')


@endsection

@section('main-content')
   <div class="breadcrumb">
              
    </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="card-title mb-3">Create User</div>
                            <form method="POST" action="{{ route('users.store') }}">
                                @csrf
                                <div class="row">
                                    
                                <div class="form-group col-6">
                                    <label class="form-control-label" for="name">{{ __('Name') }}</label>
                                    <input type="text" name="name" id="name" class="form-control form-control-alternative @error('name') is-invalid @enderror" placeholder="{{ __('Name') }}" value="{{old('name')}}">
                                    
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


                                   
                                
                                <div class="form-group col-6">
                                    <label class="form-control-label" for="email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="emil" class="form-control form-control-alternative @error('email') is-invalid @enderror" placeholder="{{ __('Email') }}" value="{{old('email')}}">
                                    
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            
                                <div class="form-group col-6">
                                    <label class="form-control-label" for="password">{{ __('Password') }}</label>
                                    <input type="password" name="password" id="password" class="form-control form-control-alternative @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}" >
                                    
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>


     

                                    <div class="col-md-12">
                                         <button class="btn btn-primary">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>


@endsection

@section('page-js')




@endsection

@section('bottom-js')