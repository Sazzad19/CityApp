@extends('admin.layouts.master')
@section('ext_css')

@endsection
@section('content')
<div class="page-breadcrumb">
  <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Notification</h4>
          <div class="ml-auto text-right">
            
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
            <form class="form-horizontal">
                {{ csrf_field()}}

                <div class="card-body">
                <h4 class="card-title">Send Notification to {{$subscriber->name}}</h4>
                    <div class="form-group row">
                        <label for="title" class="col-sm-3 text-right control-label col-form-label">Title</label>
                        <div class="col-sm-6">
                        <input type="text" class="form-control" id="title" name="title">             
                       </div>
                    </div>

                    <div class="form-group row">
                        <label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                        <div class="col-sm-6">
{{--<input type="text" class="form-control" id="description" name="description">!--}}
                            <textarea class="form-control" id="description" name="description"></textarea>
                            
                          
                            
                        </div>
                    </div>

   
               
                    
                   
                    
                </div>
                <div class="border-top">
                    <div class="card-body">
                        <button type="submit" class="btn btn-primary">Send</button>
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