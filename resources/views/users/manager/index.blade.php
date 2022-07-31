@extends('layouts.user_layouts.app')

@section('content')


<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4">Properties Managed</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                       data-bgColor="#F9B9B9" value="58"
                                       data-skin="tron" data-angleOffset="180" data-readOnly=true
                                       data-thickness=".15"/>
                            </div>

                            <div class="widget-detail-1 text-end">
                                <h2 class="fw-normal pt-2 mb-1"> 0 </h2>
                                <p class="text-muted mb-1">Properties</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-3">Units Onboarded</h4>

                        <div class="widget-box-2">
                            <div class="widget-detail-2 text-end">
                                <span class="badge bg-success rounded-pill float-start mt-3">0 <i class="mdi mdi-trending-up"></i> </span>
                                <h2 class="fw-normal mb-1"> 0 </h2>
                                <p class="text-muted mb-3">Units </p>
                            </div>
                            <div class="progress progress-bar-alt-success progress-sm">
                                <div class="progress-bar bg-success" role="progressbar"
                                        aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 77%;">
                                    <span class="visually-hidden">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-4">Tenants</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                        data-bgColor="#FFE6BA" value="58"
                                        data-skin="tron" data-angleOffset="180" data-readOnly=true
                                        data-thickness=".15"/>
                            </div>
                            <div class="widget-detail-1 text-end">
                                <h2 class="fw-normal pt-2 mb-1"> 0 </h2>
                                <p class="text-muted mb-1">Tenants</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-3">Artisans</h4>

                        <div class="widget-box-2">
                            <div class="widget-detail-2 text-end">
                                <span class="badge bg-pink rounded-pill float-start mt-3">0 <i class="mdi mdi-trending-up"></i> </span>
                                <h2 class="fw-normal mb-1"> 0 </h2>
                                <p class="text-muted mb-3">Artisans</p>
                            </div>
                            <div class="progress progress-bar-alt-pink progress-sm">
                                <div class="progress-bar bg-pink" role="progressbar"
                                        aria-valuenow="77" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 77%;">
                                    <span class="visually-hidden">0</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

        </div>
        <!-- end row -->





        <div class="row">

            <div class="col-xl-12">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Another action</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Something else</a>
                                <!-- item-->
                                <a href="javascript:void(0);" class="dropdown-item">Separated link</a>
                            </div>
                        </div>

                        <h4 class="header-title mt-0 mb-3">Tenants</h4>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Property</th>
                                    <th>Tenant</th>
                                    <th>Tel</th>
                                    <th>Email</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                    
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>EFAB Properties Apo</td>
                                        <td>James Paul</td>
                                        <td>08162445607</td>
                                        <td>jamespaul@gmail.com</td>
                                        <td>01/01/2017</td>
                                        <td>01/01/2018</td>
                                        <td><span class="badge bg-danger">inactive</span></td>
                                        <td>
                                        <div class="row">
                                                    <div class="col-6">
                                                        <a href="#"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                    <!-- <div class="col-6">
                                                        <span><a href="#"><i class="fas fa-pen"></i></a></span>
                                                    </div> -->
                                                </div>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td>2</td>
                                        <td>EFAB Properties Apo</td>
                                        <td>Nandom Paul</td>
                                        <td>08162445607</td>
                                        <td>nan4paul@gmail.com</td>
                                        <td>01/01/2022</td>
                                        <td>01/01/2023</td>
                                        <td><span class="badge bg-success">active</span></td>
                                        <td>
                                        <div class="row">
                                                    <div class="col-6">
                                                        <a href="#"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                    <!-- <div class="col-6">
                                                        <span><a href="#"><i class="fas fa-pen"></i></a></span>
                                                    </div> -->
                                                </div>
                                        </td>
                                    </tr>
                                   

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

        </div>
        <!-- end row -->

    </div> <!-- container -->

</div> <!-- content -->

@endsection
@section('js')
    <script src="dist/js/selectField.js"></script>
@endsection
