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

                        <h4 class="header-title mt-0 mb-4">Year Spent</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                       data-bgColor="#F9B9B9" value="58"
                                       data-skin="tron" data-angleOffset="180" data-readOnly=true
                                       data-thickness=".15"/>
                            </div>

                            <div class="widget-detail-1 text-end">
                                <h2 class="fw-normal pt-2 mb-1"> 0 </h2>
                                <p class="text-muted mb-1">Year Spent</p>
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

                        <h4 class="header-title mt-0 mb-3">Complaint</h4>

                        <div class="widget-box-2">
                            <div class="widget-detail-2 text-end">
                                <span class="badge bg-success rounded-pill float-start mt-3">0% <i class="mdi mdi-trending-up"></i> </span>
                                <h2 class="fw-normal mb-1"> 0 </h2>
                                <p class="text-muted mb-3"> Resolved</p>
                            </div>
                            <div class="progress progress-bar-alt-success progress-sm">
                                <div class="progress-bar bg-success" role="progressbar"
                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 0%;">
                                    <span class="visually-hidden">0% Complete</span>
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

                        <h4 class="header-title mt-0 mb-4">Complaints</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#ffbd4a"
                                        data-bgColor="#FFE6BA" value="58"
                                        data-skin="tron" data-angleOffset="180" data-readOnly=true
                                        data-thickness=".15"/>
                            </div>
                            <div class="widget-detail-1 text-end">
                                <h2 class="fw-normal pt-2 mb-1"> 0 </h2>
                                <p class="text-muted mb-1">Pending</p>
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

                        <h4 class="header-title mt-0 mb-3">Units Leased</h4>

                        <div class="widget-box-2">
                            <div class="widget-detail-2 text-end">
                                <span class="badge bg-pink rounded-pill float-start mt-3">0% <i class="mdi mdi-trending-up"></i> </span>
                                <h2 class="fw-normal mb-1"> 0 </h2>
                                <p class="text-muted mb-3">Leased</p>
                            </div>
                            <div class="progress progress-bar-alt-pink progress-sm">
                                <div class="progress-bar bg-pink" role="progressbar"
                                        aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"
                                        style="width: 0%;">
                                    <span class="visually-hidden">0% Complete</span>
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

                        <h4 class="header-title mt-0 mb-3">Occupancy</h4>

                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Property Name</th>
                                    <th>Unit Occupied</th>
                                    <th>Amount</th>
                                    <th>Rent Start Date</th>
                                    <th>Rent Due Date</th>
                                    <th>Rent Status</th>    
                                    <th>Action</th>                                
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>EFAB Sunshine Estate Apo</td>
                                        <td>House 09</td>
                                        <td>N350,000</td>
                                        <td>26/04/2022</td>
                                        <td>26/04/2023</td>
                                        <td><span class="badge bg-success">active</span></td>  
                                        <td>
                                            <div class="row">
                                                    <div class="col-6">
                                                        <a href="#"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                    <!-- <div class="col-6">
                                                        <span><a href="#"><i class="fas fa-pen"></i></a></span>
                                                    </div>
                                                </div> -->
                                        </td>                                      
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>EFAB Sunshine Estate Apo</td>
                                        <td>House 10</td>
                                        <td>N350,000</td>
                                        <td>26/04/2021</td>
                                        <td>26/04/2022</td>
                                        <td><span class="badge bg-danger">expired</span></td>  
                                        <td>
                                            <div class="row">
                                                    <div class="col-6">
                                                        <a href="#"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                    <!-- <div class="col-6">
                                                        <span><a href="#"><i class="fas fa-pen"></i></a></span>
                                                    </div>
                                                </div> -->
                                        </td>                                                                 
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>EFAB Sunshine Estate Apo</td>
                                        <td>House 6</td>
                                        <td>N350,000</td>
                                        <td>26/04/2021</td>
                                        <td>26/03/2022</td>
                                        <td><span class="badge bg-warning">about to expire</span></td>
                                        <td>
                                            <div class="row">
                                                    <div class="col-6">
                                                        <a href="#"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                    <!-- <div class="col-6">
                                                        <span><a href="#"><i class="fas fa-pen"></i></a></span>
                                                    </div>
                                                </div> -->
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
