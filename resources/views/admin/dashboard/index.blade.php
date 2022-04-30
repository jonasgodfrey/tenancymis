@extends('layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">MyTenants MIS</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
                        </ol>
                    </div>
                    <h4 class="page-title">Dashboard</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>

                        </div>

                        <h4 class="header-title mt-0 mb-4">Total Properties</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                       data-bgColor="#F9B9B9" value="0"
                                       data-skin="tron" data-angleOffset="180" data-readOnly=true
                                       data-thickness=".15"/>
                            </div>


                            <div class="widget-detail-1 text-end">
                                <h2 class="fw-normal pt-2 mb-1"> 0 </h2>
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

                        </div>

                        <h4 class="header-title mt-0 mb-4">Total Units</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                       data-bgColor="#FF00CC" value="0"
                                       data-skin="tron" data-angleOffset="180" data-readOnly=true
                                       data-thickness=".15"/>
                            </div>


                            <div class="widget-detail-1 text-end">
                                <h2 class="fw-normal pt-2 mb-1"> 0 </h2>
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

                        </div>

                        <h4 class="header-title mt-0 mb-4">Total Tenants</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                       data-bgColor="#4300A3" value="0"
                                       data-skin="tron" data-angleOffset="180" data-readOnly=true
                                       data-thickness=".15"/>
                            </div>


                            <div class="widget-detail-1 text-end">
                                <h2 class="fw-normal pt-2 mb-1"> 0 </h2>
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

                        </div>

                        <h4 class="header-title mt-0 mb-4">Locations</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                       data-bgColor="#00FF12" value="0"
                                       data-skin="tron" data-angleOffset="180" data-readOnly=true
                                       data-thickness=".15"/>
                            </div>


                            <div class="widget-detail-1 text-end">
                                <h2 class="fw-normal pt-2 mb-1"> 0 </h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>

                        </div>

                        <h4 class="header-title mt-0">Tenants Rents</h4>

                        <div class="widget-chart text-center">
                            <div id="morris-donut-example" dir="ltr" style="height: 245px;" class="morris-chart"></div>
                            <ul class="list-inline chart-detail-list mb-0">
                                <li class="list-inline-item">
                                    <h5 style="color: #ff8acc;"><i class="fa fa-circle me-1"></i>Paid</h5>
                                </li>
                                <li class="list-inline-item">
                                    <h5 style="color: #5b69bc;"><i class="fa fa-circle me-1"></i>Unpaid</h5>
                                </li>
                                <li class="list-inline-item">
                                    <h5 style="color: #35B8E0;"><i class="fa fa-circle me-1"></i>Overdue</h5>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-4">
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
                        <h4 class="header-title mt-0">Statistics</h4>
                        <div id="morris-bar-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                    </div>
                </div>
            </div><!-- end col -->

            <div class="col-xl-4">
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
                        <h4 class="header-title mt-0">Total Revenue</h4>
                        <div id="morris-line-example" dir="ltr" style="height: 280px;" class="morris-chart"></div>
                    </div>
                </div>
            </div><!-- end col -->
        </div>
        <!-- end row -->

        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="text-center">
                            <h2 class="fw-normal text-primary" data-plugin="counterup">N0</h2>
                            <h5>Total Rents</h5>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="text-center">
                            <h2 class="fw-normal text-pink" data-plugin="counterup">N0</h2>
                            <h5>Total Fees</h5>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="text-center">
                            <h2 class="fw-normal text-warning" data-plugin="counterup">N0</h2>
                            <h5>Total Taxes</h5>
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body widget-user">
                        <div class="text-center">
                            <h2 class="fw-normal text-info" data-plugin="counterup">N0</h2>
                            <h5>Total</h5>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <!-- end row -->





        <div class="row">
            <div class="col-xl-4">
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

                        <h4 class="header-title mb-3">Chats</h4>

                        <div class="inbox-widget">

                            <div class="inbox-item">
                                <a href="#">
                                    <div class="inbox-item-img"><img src="assets/images/users/user-1.jpg" class="rounded-circle" alt=""></div>
                                    <h5 class="inbox-item-author mt-0 mb-1">Chadengle</h5>
                                    <p class="inbox-item-text">Hey! there I'm available...</p>
                                    <p class="inbox-item-date">13:40 PM</p>
                                </a>
                            </div>

                            <div class="inbox-item">
                                <a href="#">
                                    <div class="inbox-item-img"><img src="assets/images/users/user-2.jpg" class="rounded-circle" alt=""></div>
                                    <h5 class="inbox-item-author mt-0 mb-1">Tomaslau</h5>
                                    <p class="inbox-item-text">I've finished it! See you so...</p>
                                    <p class="inbox-item-date">13:34 PM</p>
                                </a>
                            </div>

                            <div class="inbox-item">
                                    <a href="#">
                                    <div class="inbox-item-img"><img src="assets/images/users/user-3.jpg" class="rounded-circle" alt=""></div>
                                    <h5 class="inbox-item-author mt-0 mb-1">Stillnotdavid</h5>
                                    <p class="inbox-item-text">This theme is awesome!</p>
                                    <p class="inbox-item-date">13:17 PM</p>
                                </a>
                            </div>

                            <div class="inbox-item">
                                <a href="#">
                                    <div class="inbox-item-img"><img src="assets/images/users/user-4.jpg" class="rounded-circle" alt=""></div>
                                    <h5 class="inbox-item-author mt-0 mb-1">Kurafire</h5>
                                    <p class="inbox-item-text">Nice to meet you</p>
                                    <p class="inbox-item-date">12:20 PM</p>
                                </a>
                            </div>

                            <div class="inbox-item">
                                <a href="#">
                                    <div class="inbox-item-img"><img src="assets/images/users/user-5.jpg" class="rounded-circle" alt=""></div>
                                    <h5 class="inbox-item-author mt-0 mb-1">Shahedk</h5>
                                    <p class="inbox-item-text">Hey! there I'm available...</p>
                                    <p class="inbox-item-date">10:15 AM</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

            <div class="col-xl-8">
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
                                    <th>Shop</th>
                                    <th>Start Date</th>
                                    <th>Due Date</th>
                                    <th>Status</th>
                                    <th>Tenant Tel</th>
                                </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Shop 1</td>
                                        <td>01/01/2017</td>
                                        <td>01/01/2018</td>
                                        <td><span class="badge bg-warning">Unpaid</span></td>
                                        <td>08162445607</td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Shop 1</td>
                                        <td>01/01/2017</td>
                                        <td>01/01/2018</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                        <td>08162445607</td>
                                    </tr>
                                    <tr>
                                        <td>3</td>
                                        <td>Shop 1</td>
                                        <td>01/01/2017</td>
                                        <td>01/01/2018</td>
                                        <td><span class="badge bg-danger">Overdue</span></td>
                                        <td>08162445607</td>
                                    </tr>
                                    <tr>
                                        <td>4</td>
                                        <td>Shop 1</td>
                                        <td>01/01/2017</td>
                                        <td>01/01/2018</td>
                                        <td><span class="badge bg-success">Paid</span></td>
                                        <td>08162445607</td>
                                    </tr>
                                    <tr>
                                        <td>5</td>
                                        <td>Shop 1</td>
                                        <td>01/01/2017</td>
                                        <td>01/01/2018</td>
                                        <td><span class="badge bg-danger">Unpaid</span></td>
                                        <td>08162445607</td>
                                    </tr>

                                    <tr>
                                        <td>6</td>
                                        <td>Shop 1</td>
                                        <td>01/01/2017</td>
                                        <td>01/01/2018</td>
                                        <td><span class="badge bg-danger">Unpaid</span></td>
                                        <td>08162445607</td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div><!-- end col -->

        </div>
        <!-- end row -->

    </div> <!-- container-fluid -->

</div> <!-- content -->
@endsection
@section('js')
    <script src="dist/js/selectField.js"></script>
@endsection