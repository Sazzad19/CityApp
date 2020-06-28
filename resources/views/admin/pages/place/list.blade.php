@extends('admin.layouts.master')
@section('ext_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/extra-libs/multicheck/multicheck.css') }}">
<link href="{{ asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Place Table</h4>
            <div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                <a type="button" href="{{route('places.create')}}" class="btn btn-success">Add Place</a>
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
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Place List</h5>
               
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.I.</th>
                                <th>Place Name</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Location</th>

                                <th>Contact No</th>
                                <th>Website</th>
                                <th>Charge</th>
                              
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1; 
                         @endphp
                       @foreach($places as $place)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$place->name}}</td>
                                <td>{{$place->state->name}}</td>
                                <td>{{$place->city->name}}</td>
                                <td>{{$place->category->name}}</td>                               
                                <td>{{$place->subcategory ?  $place->subcategory->name : ''}}</td>
                                <td>{{$place->location}}</td>
                                
                                <td>{{$place->phone_number}}</td>
                                <td>{{$place->website}}</td>
                                <td>{{$place->charges}}</td>
                               
                                <td>Latitude : {{$place->lat}}, Longitude: {{$place->lng}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <a type="button" class="btn btn-primary" href="{{route('places.edit',$place->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                   
                                        </div>
                                        <div class="col-sm-12">
                                            <form action="{{route('places.destroy', $place->id)}}" method="post">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{ csrf_field()}}
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure to Delete?')"> <i class="fa fa-trash"></i> </button>
                                            </form>
                                        </div>
                                        <div class="col-sm-12"> 
                                        <a type="button" class="btn btn-info" href="{{route('places.show', $place->id)}}">
                                            <i class="fa fa-eye"></i>
                                    </a>
                                        </div>
                                    </div>
                                </td>
                               
                            </tr>
                            @php
                              $i++;
                            @endphp
                        @endforeach
                           
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>S.I.</th>
                                <th>Place Name</th>
                                <th>State</th>
                                <th>City</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>Location</th>
                                
                                <th>Contact No</th>
                                <th>Website</th>
                                <th>Charges</th>
                                
                                <th>Position</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>

            </div>
        </div>

            </div>
        </div>
@endsection
@section('ext_scr')
<script src="{{ asset('admin/assets/extra-libs/multicheck/datatable-checkbox-init.js') }}"></script>
<script src="{{ asset('admin/assets/extra-libs/multicheck/jquery.multicheck.js') }}"></script>
<script src="{{ asset('admin/assets/extra-libs/DataTables/datatables.min.js') }}"></script>
<script>
    /****************************************
     *       Basic Table                   *
     ****************************************/
    $('#zero_config').DataTable();
</script>

@endsection