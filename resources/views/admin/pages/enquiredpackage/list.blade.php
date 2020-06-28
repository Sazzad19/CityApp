@extends('admin.layouts.master')
@section('ext_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/extra-libs/multicheck/multicheck.css') }}">
<link href="{{ asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Enquired Package Table</h4>
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
                <h5 class="card-title">Enquired Package List</h5>
               
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.I.</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Start Location</th>
                                <th>Visit Location</th>
                                <th>Hotel Type</th>
                                <th>Transport Mode</th>
                                <th>Travel Mode</th>
                                <th>Number of Persons</th>                                                         
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1; 
                         @endphp
                       @foreach($enquiredpackages as $enquiredpackage)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$enquiredpackage->name}}</td>
                                <td>{{$enquiredpackage->email}}</td>
                                <td>
                                    <p>{{$enquiredpackage->phone_number}}</p>
                                <p>Alternate Number: {{$enquiredpackage->alternate_number}}</p>
                                </td>
                                <td>{{$enquiredpackage->start_location}}</td>                               
                                <td>{{$enquiredpackage->visit_location}}</td>
                                <td>{{$enquiredpackage->hotel_type}}</td>
                                
                                <td>{{$enquiredpackage->transport_mode}}</td>
                                <td>{{$enquiredpackage->travel_mode}}</td>
                                <td>{{$enquiredpackage->person_number}}</td>
                               
                                <td>
                                    <div class="row">
                                     
                                        <div class="col-sm-12">
                                            <form action="{{route('enquiredpackages.destroy', $enquiredpackage->id)}}" method="post">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{ csrf_field()}}
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure to Delete?')"> <i class="fa fa-trash"></i> </button>
                                            </form>
                                        </div>
                                       {{--<div class="col-sm-12"> 
                                        <a type="button" class="btn btn-info" href="{{route('places.show', $place->id)}}">
                                            <i class="fa fa-eye"></i>
                                    </a>
                                        </div>!--}}
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
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone Number</th>
                                <th>Start Location</th>
                                <th>Visit Location</th>
                                <th>Hotel Type</th>
                                <th>Transport Mode</th>
                                <th>Travel Mode</th>
                                <th>Number of Persons</th>                           
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