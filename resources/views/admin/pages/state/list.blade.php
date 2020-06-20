@extends('admin.layouts.master')
@section('ext_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/extra-libs/multicheck/multicheck.css') }}">
<link href="{{ asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">State Table</h4>
            <div class="ml-auto text-right">
                <a type="button" href="{{route('states.create')}}" class="btn btn-success">Add State</a>

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
                <h5 class="card-title">State List</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.I.</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1; 
                         @endphp
                       @foreach($states as $state)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$state->name}}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-sm-1">
                                            <a type="button" class="btn btn-primary" href="{{route('states.edit',$state->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>
                                        <div class="col-sm-1">
                                            <form action="{{route('states.destroy', $state->id)}}" method="post">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{ csrf_field()}}
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure to Delete?')"> <i class="fa fa-trash"></i> </button>
                                            </form>
                                        </div>
                                        <div class="col-sm-1"> 
                                    <a href="{{route('city.create',$state->id)}}" class="btn btn-info "><i class="far fa-plus-square"></i>Add City</a>
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
                                <th>Name</th>
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