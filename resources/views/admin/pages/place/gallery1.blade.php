@extends('admin.layouts.master')
@section('ext_css')
<link href="{{ asset('admin/assets/libs/magnific-popup/dist/magnific-popup.css') }}" rel="stylesheet">

@endsection
@section('content')
                       <!-- ============================================================== -->
            <!-- Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">Image Gallery - {{$place->name}}</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <a type="button" href="{{route('places.create')}}" class="btn btn-success">Add Photo</a>

                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- End Bread crumb and right sidebar toggle -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container-fluid">
                <!-- ============================================================== -->
                <!-- Start Page Content -->
                <!-- ============================================================== -->
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
                                    <h4 class="m-b-0"><a type="button" href="{{route('places.create')}}" class="btn btn-danger btn-sm">Delete</a>
                                    </h4> {{--<span class="text-muted">subtitle of project</span>!--}}
                                </div>
                            </div>
                        </div>
                    </div>

                    @endforeach
                   
                   
                   
                  
                  
                   
                   
                </div>
                <!-- ============================================================== -->
                <!-- End PAge Content -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Right sidebar -->
                <!-- ============================================================== -->
                <!-- .right-sidebar -->
                <!-- ============================================================== -->
                <!-- End Right sidebar -->
                <!-- ============================================================== -->
            
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
@endsection
@section('ext_scr')

<script src="{{ asset('admin/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('admin/assets/libs/magnific-popup/meg.init.js') }}"></script>

@endsection