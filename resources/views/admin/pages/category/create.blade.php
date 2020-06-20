@extends('admin.layouts.master')
@section('ext_css')

@endsection
@section('content')
<div class="page-breadcrumb">
  <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Create Category</h4>
          <div class="ml-auto text-right">
            <a type="button" href="{{route('categories.index')}}" class="btn btn-success">Category List</a>
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
            <form class="form-horizontal" method="post" action="{{route('categories.store')}}" >
                {{ csrf_field()}}
                <div class="card-body">
                    <h4 class="card-title">Category Info</h4>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Category Name Here">
                            
                            <div class="error">
                                @if($errors->has('name'))
                                       {{$errors->first('name')}}
                                   @endif
                            </div>
                            
                        </div>
                    </div>
               
                    
                   
                    
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
 


    </div>
  </div>
</div>
@endsection
@section('ext_scr')


@endsection