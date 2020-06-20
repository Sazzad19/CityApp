@extends('admin.layouts.master')
@section('ext_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/libs/select2/dist/css/select2.min.css') }}">

@endsection
@section('content')
<div class="page-breadcrumb">
  <div class="row">
      <div class="col-12 d-flex no-block align-items-center">
          <h4 class="page-title">Create Place</h4>
          <div class="ml-auto text-right">
            <nav aria-label="breadcrumb">
                <a type="button" href="{{route('places.index')}}" class="btn btn-success btn-lg">Place List</a>
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
        <form class="form-horizontal" method="post" action="{{route('places.store')}}" enctype="multipart/form-data">
             {{ csrf_field() }}
                <div class="card-body">
                    <h4 class="card-title">Place Info</h4>
                    <div class="form-group row">
                        <label for="name" class="col-sm-3 text-right control-label col-form-label">Place Name</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="name" name="name" placeholder="Place Name Here">
                            <div class="error">
                                @if($errors->has('name'))
                                       {{$errors->first('name')}}
                                   @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select State</label>
                        <div class="col-md-6">
                            <select class="select2 form-control custom-select" id="state" name="state_id" style="width: 100%; height:36px;">
                                <option>Select</option>
 
                                <optgroup label="State List">
                                    @foreach ($states as $state)
                                    <option value="{{$state->id}}">{{$state->name}}</option>
                                    @endforeach                                
                                </optgroup>
                            </select>
                            <div class="error">
                                @if($errors->has('state_id'))
                                       {{$errors->first('state_id')}}
                                   @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select City</label>
                        <div class="col-md-6">
                            <select class="select2 form-control custom-select" id="city" name="city_id" disabled style="width: 100%; height:36px;">
                                <option>Select</option>
  
                            </select>
                            <div class="error">
                                @if($errors->has('city_id'))
                                       {{$errors->first('city_id')}}
                                   @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Category</label>
                        <div class="col-md-6">
                            <select class="form-control" id="category" name="category_id"  style="width: 100%; height:36px;">
                                <option>Select</option>
                                <optgroup label="Category List">
                                    @foreach ($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach                                
                                </optgroup>                              
                            </select>
                            <div class="error">
                                @if($errors->has('category_id'))
                                       {{$errors->first('category_id')}}
                                   @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="fname" class="col-sm-3 text-right control-label col-form-label">Select Subcategory</label>
                        <div class="col-md-6">
                            <select class="select2 form-control custom-select" id="subcategory" name="subcategory_id" disabled style="width: 100%; height:36px;">
                                <option>Select</option>                                                                    
                          </select>
                          <div class="error">
                            @if($errors->has('subcategory_id'))
                                   {{$errors->first('subcategory_id')}}
                               @endif
                        </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="location" class="col-sm-3 text-right control-label col-form-label">Location</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="location" name="location" placeholder="Location Here">
                            <div class="error">
                                @if($errors->has('location'))
                                       {{$errors->first('location')}}
                                   @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-sm-3 text-right control-label col-form-label">Description</label>
                        <div class="col-sm-6">
                            <textarea class="form-control" id="description" name="description" rows="3" cols="105"> </textarea>
                            <div class="error">
                                @if($errors->has('description'))
                                       {{$errors->first('description')}}
                                   @endif
                            </div>
                            
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="phone_number" class="col-sm-3 text-right control-label col-form-label">Contact No</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="phone_number" name="phone_number" placeholder="Contact No Here">
                            <div class="error">
                                @if($errors->has('phone_number'))
                                       {{$errors->first('phone_number')}}
                                   @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="website" class="col-sm-3 text-right control-label col-form-label">Website</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="website" name="website" placeholder="Website Here">
                            <div class="error">
                                @if($errors->has('website'))
                                       {{$errors->first('website')}}
                                   @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="charges" class="col-sm-3 text-right control-label col-form-label">Charges</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" id="charges" name="charges" placeholder="Charges Here(Ex.200.00)">
                            <div class="error">
                                @if($errors->has('charges'))
                                       {{$errors->first('charges')}}
                                   @endif
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="charges" class="col-sm-3 text-right control-label col-form-label">Images</label>
                        <div class="col-md-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="images[]" required multiple>
                                <label class="custom-file-label">Choose Single or Multiple files...</label>
                                <div class="invalid-feedback">Example invalid custom file feedback</div>
                                <div class="error">
                                    @if($errors->has('images'))
                                           {{$errors->first('images')}}
                                       @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="charges" class="col-sm-3 text-right control-label col-form-label">Document(pdf)</label>
                        <div class="col-md-6">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="document" id="validatedCustomFile">
                                <label class="custom-file-label" for="validatedCustomFile">Choose file...</label>
                                
                                <div class="error">
                                    @if($errors->has('document'))
                                           {{$errors->first('document')}}
                                       @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 text-right control-label col-form-label">Position</label>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="lat" name="lat" placeholder="Latitude Here">
                            <div class="error">
                                @if($errors->has('lat'))
                                       {{$errors->first('lat')}}
                                   @endif
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <input type="text" class="form-control" id="lng" name="lng" placeholder="Longitude Here">
                            <div class="error">
                                @if($errors->has('lng'))
                                       {{$errors->first('lng')}}
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
<script src="{{ asset('admin/assets/libs/select2/dist/js/select2.full.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/select2/dist/js/select2.min.js') }}"></script>


<script>
    //***********************************//
    // For select 2
    //***********************************//
    $("#state").select2();
    $("#city").select2();
    $("#category").select2();
    $("#subcategory").select2();


    $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
    

$(document).ready(function () {
             
             $('#category').on('change',function(e) {
              
              var cat_id = e.target.value;

              $.ajax({
                    
                    url:"{{ route('getSubcategory') }}",
                    type:"POST",
                    data: {
                        cat_id: cat_id
                     },
                   
                    success:function (data) {
                        $element = $("#subcategory");
                        $element.removeAttr('disabled');
                        $element.empty();

                        $(data).each(function(){
                        $element.append("<option value='"+ this.id +"'>"+ this.name +"</option>");
                        });

                     //$('#subcategory').empty();

                     /*$.each(data.subcategories[0].subcategories,function(index,subcategory){
                         
                         $('#subcategory').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                     })*/

                    }
                })
             });

             $('#state').on('change',function(e) {
              
              var state_id = e.target.value;

              $.ajax({
                    
                    url:"{{ route('getCities') }}",
                    type:"POST",
                    data: {
                        state_id: state_id
                     },
                   
                    success:function (data) {
                        $element = $("#city");
                        $element.removeAttr('disabled');
                        $element.empty();

                        $(data).each(function(){
                        $element.append("<option value='"+ this.id +"'>"+ this.name +"</option>");
                        });

                     //$('#subcategory').empty();

                     /*$.each(data.subcategories[0].subcategories,function(index,subcategory){
                         
                         $('#subcategory').append('<option value="'+subcategory.id+'">'+subcategory.name+'</option>');
                     })*/

                    }
                })
             });

         });
 
</script>

@endsection