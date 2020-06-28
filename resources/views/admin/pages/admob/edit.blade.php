@extends('admin.layouts.master')
@section('ext_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/select2/dist/css/select2.min.css') }}">

@endsection
@section('content')
<div class="page-breadcrumb">
  <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Edit Admob</h4>
          <div class="ml-auto text-right">
            <nav aria-label="breadcrumb">
                <a type="button" href="{{route('admobs.index')}}" class="btn btn-success">Admob List</a>
            </nav>
        </div>

         
      </div>
      @if(Session::has('success'))
      <div class="col-sm-12">
                <div class="alert alert-success">
                    <h5>{{ Session::get('success') }}</h5>
                </div>
         
            @endif
       
            @if(Session::has('error'))
                <div class="alert alert-danger">
                    <h5>{{ Session::get('error') }}</h5>
                </div>
      </div>
            @endif

  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-md-12">
        <div class="card">
        <form class="form-horizontal" method="post" action="{{route('admobs.update', $admob->id)}}" enctype="multipart/form-data">
             {{ csrf_field() }}
             <input type="hidden" name="_method" value="put" />

                <div class="card-body">
                    <h4 class="card-title">Admob Info</h4>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">App Id</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" id="app_id" name="app_id" value="{{$admob->app_id}}">
                            <div class="error">
                                @if($errors->has('app_id'))
                                       {{$errors->first('app_id')}}
                                   @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Interstitial Id</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="interstitial_id" name="interstitial_id" value="{{$admob->interstitial_id}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Banner Id</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="banner_id" name="banner_id" value="{{$admob->banner_id}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Native Id</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="native_id" name="native_id" value="{{$admob->native_id}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">URL</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="url" name="url" value="{{$admob->url}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="charges" class="col-sm-3 text-right control-label col-form-label">Image</label>
                        <div class="col-md-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" required>
                                <label class="custom-file-label">Choose file...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Active</label>
                        <div class="col-md-6">
                            <select class="select2 form-control custom-select" id="active" name="active" style="width: 100%; height:36px;">
                                <option>Select</option>
                                <option value="1" {{$admob->active == 1 ? 'selected' : ''}}>ON</option>
                                <option value="0" {{$admob->active == 0 ? 'selected' : ''}}>OFF</option>
  
                            </select>
                           
                        </div>
                    </div>

                  
                  
                  
                   
                   


                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
 


    </div>
  </div>
</div>
@endsection
@section('ext_scr')
<script src="{{ asset('admin/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/select2/dist/js/select2.min.js') }}"></script>


<script>
    //***********************************//
    // For select 2
    //***********************************//
    $("#active").select2();
 
</script>

@endsection