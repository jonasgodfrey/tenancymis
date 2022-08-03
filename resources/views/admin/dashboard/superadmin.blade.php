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

                            <h4 class="header-title mt-0 mb-4">Registered Users</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#F9B9B9" value="{{ $registeredUsers }}" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div>


                                <div class="widget-detail-1 text-end">
                                <a href="/tenants">
                                <button type="submit" class="btn btn-success btn-xs text-white modal-btn capital-w" data-toggle="modal"
                                                    data-target="=#exampleModal" style="color:#f05050">Register <i class="mdi mdi-domain me-1"></i>
                                </button>
                                </a>
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

                            <h4 class="header-title mt-0 mb-4">Subscribed Users</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#FF00CC" value=" {{ $subscribers }}" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div>


                                <div class="widget-detail-1 text-end">
                                <a href="/units">
                                <button type="submit" class="btn btn-success btn-xs text-white modal-btn capital-w" data-toggle="modal"
                                                    data-target="=#exampleModal">Subscribers <i class="mdi mdi-home-plus me-1"></i>
                                </button>
                                </a>
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

                            <h4 class="header-title mt-0 mb-4">Properties Onboarded</h4>

                            <div class="widget-chart-1">
                                <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#4300A3" value=" {{ $properties_all }}" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div>


                                <div class="widget-detail-1 text-end">
                                <a href="/property">
                                <button type="submit" class="btn btn-success btn-xs text-white modal-btn capital-w" data-toggle="modal"
                                                    data-target="=#exampleModal">Properties <i class="mdi mdi-account-group me-1"></i>
                                </button>
                                </a>
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

                            <h4 class="header-title mt-0 mb-4">Total Subscription</h4>

                            <div class="widget-chart-1">
                                <!-- <div class="widget-chart-box-1 float-start" dir="ltr">
                                    <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 "
                                        data-bgColor="#00FF12" value="{{ $subscriptions }}" data-skin="tron"
                                        data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                                </div> -->


                                <div class="widget-detail-1 text-end">
                                
                                    <h2 class="fw-normal pt-2 mb-1"><br>₦{{ $subscriptions ?? '0' }}</h2>
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

                            <h4 class="header-title mt-0 mb-3">Subscribed Properties</h4>

                            <div class="table-responsive">
                                <table id="datatable-buttons" class="table table-hover mb-0 dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Name</th>
                                            <!-- <th>Category</th> -->
                                            <th>Email</th>
                                            <th>Tel</th>                                          
                                            <th>End Date</th>
                                            <th>Amount</th>
                                            

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @php
                                            $count = 0;                                         
                                            
                                        @endphp

                                    @forelse ($subscribedUsers as $subscribedUser)
                                    
                                    @php
                                            $count++;                                         
                                            
                                        @endphp

                                        <tr>
                                            <td>{{ $count }}</td>
                                            <td>{{ $subscribedUser->user->name}}</td>
                                            <td>{{ $subscribedUser->user->email }}</td>
                                            <td>{{ $subscribedUser->user->phone }}</td>
                                            <td>{{ $subscribedUser->end_date }}</td>
                                            <td>{{ $subscribedUser->amount }}</td>

                                          

                                        </tr>
                                    @empty
                                    @endforelse
                                    

                                </tbody>
                                    <!-- <tbody>
                                       <tr>
                                        <td>1</td>
                                        <td>EFAB Properties</td>
                                        <td>Residential</td>
                                        <td>efab@gmail.com</td>
                                        <td>08162445607</td>
                                        <td>Area 11 Abuja</td>
                                        <td>11/07/2022</td>
                                        <td>Active</td>
                                       </tr>
                                    </tbody> -->
                                </table>
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
                                <h2 class="fw-normal text-pink" data-plugin="counterup">{{ $units_all ?? '0' }}</h2>
                                <h5>Total Units Onboarded</h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body widget-user">
                            <div class="text-center">
                                <h2 class="fw-normal text-info" data-plugin="counterup">{{ $tenants_all ?? '0' }}</h2>
                                <h5>Tenanats Onboarded</h5>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body widget-user">
                            <div class="text-center">
                                <h2 class="fw-normal text-pink" data-plugin="counterup">{{ $residential ?? '0' }}</h2>
                                <h5>Residential Properties</h5>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-3 col-md-6">
                    <div class="card">
                        <div class="card-body widget-user">
                            <div class="text-center">
                                <h2 class="fw-normal text-warning" data-plugin="counterup">{{ $commercial ?? '0' }}</h2>
                                <h5>Commercial Properties</h5>
                            </div>
                        </div>
                    </div>

                </div>

                
            </div>
            <!-- end row -->


           


            

        </div> <!-- container-fluid -->

    </div> <!-- content -->
@endsection
@section('js')
    <script src="dist/js/selectField.js"></script>
@endsection
