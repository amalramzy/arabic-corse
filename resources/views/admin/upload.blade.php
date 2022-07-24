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
                            <div class="card-title mb-3">upload Image</div>
                            <form method="POST" action="{{ route('admins.upload', [$admin->id]) }}" enctype="multipart/form-data" >
                                @csrf
                               
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div class="card-title">File inputs</div>
                
                                                <div class="input-group mb-3">
                                                    <div class="custom-file">
                                                        <input name="image" type="file" class="custom-file-input" id="inputGroupFile02">
                                                        <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose
                                                                    file</label>
                                                    </div>
                                                    <div class="input-group-append">
                                                        <span class="input-group-text" id="inputGroupFileAddon02">Upload</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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