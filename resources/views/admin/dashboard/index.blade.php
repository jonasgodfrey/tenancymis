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
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Total Properties</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#F9B9B9" value="{{ $properties }}" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div>


                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1"> {{ $properties }} </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Total Units</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#FF00CC" value=" {{ $units }}" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div>


                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1"> {{ $units }} </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Total Tenants</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#4300A3" value=" {{ $tenants_num }}" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div>


                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1"> {{ $tenants_num }} </h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- end col -->
                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0 mb-4">Locations</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#00FF12" value="{{ $properties }}" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div>


                                <div class="widget-detail-1 text-end">
                                    <h2 class="fw-normal pt-2 mb-1"> {{ $properties }} </h2>
                                </div>
                            </div>
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
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="mdi mdi-dots-vertical"></i>
                                </a>

                            </div>

                            <h4 class="header-title mt-0">Tenants Rents</h4>

                            <div class="widget-chart text-center">
                                <div id="morris-donut-example" dir="ltr" style="height: 245px;" class="morris-chart">
                                </div>
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
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
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
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
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

                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="dropdown float-end">
                                <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                    aria-expanded="false">
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
                                <table id="datatable-buttons" class="table table-hover mb-0 dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Property</th>
                                            <th>Unit</th>
                                            <th>Tenant</th>
                                            <th>Tenant Tel</th>
                                            <th>Start Date</th>
                                            <th>Due Date</th>
                                            <th>Status</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($tenants as $tenant)
                                            @php
                                                $payment = $tenant->current_payment;
                                                if (!empty($payment)) {
                                                    $duedate = explode(' ', $payment->duedate);
                                                    $startdate = explode(' ', $payment->startdate);
                                                }
                                                
                                            @endphp
                                            <tr>
                                                <td>{{ $tenant->id }}</td>
                                                <td>{{ $tenant->property->propname }}</td>
                                                <td>{{ $tenant->unit->name }}</td>
                                                <td>{{ $tenant->name }}</td>
                                                <td>{{ $tenant->phone }}</td>
                                                @if (!empty($payment))
                                                    <td>{{ $startdate[0] }}</td>
                                                    <td> {{ $duedate[0] }}</td>
                                                    <td><span class="badge bg-success">paid</span></td>
                                                @else
                                                    <td>null</td>
                                                    <td>null</td>
                                                    <td><span class="badge bg-danger">not paid</span></td>
                                                @endif

                                            </tr>
                                        @empty
                                            
                                        @endforelse

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
