@extends('admin.layouts.master')
@section('ext_css')
<link rel="stylesheet" type="text/css" href="{{ asset('admin/assets/extra-libs/multicheck/multicheck.css') }}">
<link href="{{ asset('admin/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endsection
@section('content')
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 class="page-title">Admob Table</h4>
            <div class="ml-auto text-right">
                <a type="button" href="{{route('admobs.create')}}" class="btn btn-success">Add Admob</a>
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
                <h5 class="card-title">Admob List</h5>
                <div class="table-responsive">
                    <table id="zero_config" class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>S.I.</th>
                                <th>App Id</th>
                                <th>Interstitial Id</th>
                                <th>Banner Id</th>
                                <th>Native Id</th>
                                <th>Image</th>
                                <th>Url</th>
                                <th>Active</th>
                                <th>Action</th>



                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $i=1; 
                         @endphp
                       @foreach($admobs as $admob)
                            <tr>
                                <td>{{$i}}</td>
                                <td>{{$admob->app_id}}</td>
                                <td>{{$admob->interstitial_id}}</td>
                                <td>{{$admob->banner_id}}</td>
                                <td>{{$admob->native_id}}</td>
                            <td><img src="{{asset('storage/'.$admob->image_path)}}" height="100px" width="100px"></td>
                                <td>{{$admob->url}}</td>
                                <td>
                                    @if($admob->active)
                                        <span class="badge badge-success">ON</span>
                                    @else
                                        <span class="badge badge-danger">OFF</span>
                                    @endif
                                </td>
                                

                                <td>
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <a type="button" class="btn btn-primary" href="{{route('admobs.edit', $admob->id)}}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                        </div>

                                        <div class="col-sm-4">
                                            <form action="{{route('admobs.destroy', $admob->id)}}" method="post">
                                                <input type="hidden" name="_method" value="DELETE">
                                                {{ csrf_field()}}
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are You Sure to Delete?')"> <i class="fa fa-trash"></i> </button>
                                            </form>
                                        </div>

                                        <div class="col-sm-4">
                                            @if($admob->active)
                                            <a type="button" class="btn btn-primary" href="{{route('admob.turnOFF',$admob->id)}}">
                                               Turn OFF
                                            </a>
                                            @else
                                            <a type="button" class="btn btn-success" href="{{route('admob.turnON',$admob->id)}}">
                                               Turn ON
                                            </a>
                                            @endif
                                            
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
                                <th>App Id</th>
                                <th>Interstitial Id</th>
                                <th>Banner Id</th>
                                <th>Native Id</th>
                                <th>Image</th>
                                <th>Url</th>
                                <th>Active</th>
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