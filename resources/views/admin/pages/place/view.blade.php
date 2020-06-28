@extends('admin.layouts.master')
@section('ext_css')
<link href="{{ asset('admin/assets/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">

@endsection
@section('content')
<div class="page-breadcrumb">
  <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
          <h3 class="page-title">{{$place->name}}</h3>
          <div class="ml-auto text-right">
            <nav aria-label="breadcrumb">
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
                    Add Photo
                     </button>
                {{--<a type="button" href="{{route('uploadPhoto', $place->id)}}" class="btn btn-success">Add Photo</a>!--}}

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
    
    <h3>Image Gallery</h3>
    <div class="row el-element-overlay">
        

        @foreach ($placeimages as $placeimage)
            
        
        <div class="col-lg-3 col-md-6">
            <div class="card">
                <div class="el-card-item">
                    <div class="el-card-avatar el-overlay-1"> <img style="height: 250px; width:250px;" src="{{ asset('storage/'.$placeimage->image_path) }}" alt="user" />
                        <div class="el-overlay">
                            <ul class="list-style-none el-info">
                                <li class="el-item"><a class="btn default btn-outline image-popup-vertical-fit el-link" href="{{ asset('storage/'.$placeimage->image_path) }}"><i class="mdi mdi-magnify-plus"></i></a></li>
                                <li class="el-item"><a class="btn default btn-outline el-link" href="javascript:void(0);"><i class="mdi mdi-link"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="el-card-content">
                        <h4 class="m-b-0"><a type="button" href="{{route('deletePhoto', $placeimage->id)}}" class="btn btn-danger btn-sm">Delete</a>
                        </h4> {{--<span class="text-muted">subtitle of project</span>!--}}
                    </div>
                </div>
            </div>
        </div>

        @endforeach
       
       
       
      
      
       
       
    </div>
  <div class="row">
    <div class="col-md-12">
        <div class="card">
            <!-- Nav tabs -->
            {{--<ul class="nav nav-tabs" role="tablist">
                <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Tab1</span></a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Tab2</span></a> </li>
                <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#messages" role="tab"><span class="hidden-sm-up"></span> <span class="hidden-xs-down">Tab3</span></a> </li>
            </ul>!--}}
            <!-- Tab panes -->
            <div class="tab-content tabcontent-border">
           
                <div>
                    <div class="p-20">
                        
                        {{--<img src="{{ asset('admin/assets/images/background/img4.jpg') }}" class="img-fluid">!--}}
                        <h3>Description</h3>
                        <p class="m-t-10" style="font-size: 15px;">{{$place->description}}</p>
                        <div class="row">
                            <div class="col-md-6">
                                <h4><span style="color: #f0954e">State : </span>{{$place->state->name}}</h4> 
                                <h4><span style="color: #f0954e">Category : </span>{{$place->category->name}}</h4>
                                <h4><span style="color: #f0954e">Location : </span>{{$place->location}}</h4>
                                <h4><span style="color: #f0954e">Website : </span>{{$place->website}}</h4>
                                <h4><span style="color: #f0954e">Map Position : </span><p>Latitude - {{$place->lat}}</p><p>Longitude - {{$place->lng}}</p></h4>

                            </div>
                            <div class="col-md-6">
                                <h4><span style="color: #f0954e">City : </span>{{$place->city->name}}</h4> 
                                <h4><span style="color: #f0954e">Subcategory : </span>@if ($place->subcategory) {{$place->subcategory->name}} @endif </h4>
                                <h4><span style="color: #f0954e">Phone Number : </span>{{$place->phone_number}}</h4>
                                <h4><span style="color: #f0954e">Charges : </span>{{$place->charges}}</h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                {{--<embed src="{{asset('storage/'.$place->document.'#toolbar=0')}}" type="application/pdf"   height="700px" width="500">!--}}
                                <h4><span style="color: #f0954e">Document:</span></h4>

                                <iframe src="{{asset('storage/'.$place->document.'#toolbar=0')}}" width="100%" height="500px">
                                </iframe>
                            </div>

                        </div>
                    </div>
                </div>
       
            </div>
        </div>
    </div>
  </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Upload Image</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="resp"></div>
         <div class="alert alert-danger print-error-msg" style="display:none">
              <ul></ul>
         </div>
          <form id="my_form" method="POST" action="{{route('uploadPhoto', $place->id)}}" enctype="multipart/form-data">
                  {{ csrf_field() }}
        <div class="modal-body">
          
                
              <input type="file" name="image" id="image" required>
              <div class="error">
                @if($errors->has('image'))
                       {{$errors->first('image')}} 
                   @endif
            </div>
  
            
              {{--<div class="upload-area"  id="uploadfile">
                <img src="{{asset('images/drag.png')}}" id="dragdrop_image" height="100px" width="150px">
                  <h1>Drag and Drop file here<br/>Or<br/>Click to select file</h1>
              </div>!--}}
             
                        
              
                     
                   
                   
                  
        </div>
        <div class="modal-footer">
          <button type="submit"class="btn btn-primary">Upload</button>
        </div>
  </form>
      </div>
  
    </div>
  </div> 
@endsection
@section('ext_scr')
<script src="{{ asset('admin/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/magnific-popup/meg.init.js') }}"></script>

@endsection