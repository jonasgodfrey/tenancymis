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
        <div id="alert">
            @include('partials.flash')
            @include('partials.modal')
        </div>
        <div class="row">

            <div class="col-xl-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="dropdown float-end">
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>

                        </div>

                        <h4 class="header-title mt-0 mb-4">No of Properties</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 " data-bgColor="#F9B9B9" value="{{ $properties }}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                            </div>


                            <div class="widget-detail-1 text-end">
                                <a href="/properties">
                                    <button type="submit" class="btn btn-success btn-xs text-white modal-btn capital-w" data-toggle="modal" data-target="=#exampleModal" style="color:#f05050">Add Property <i class="mdi mdi-domain me-1"></i>
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
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>

                        </div>

                        <h4 class="header-title mt-0 mb-4">No of Units</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 " data-bgColor="#FF00CC" value=" {{ $units }}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                            </div>


                            <div class="widget-detail-1 text-end">
                                <a href="/units">
                                    <button type="submit" class="btn btn-success btn-xs text-white modal-btn capital-w" data-toggle="modal" data-target="=#exampleModal">Add Unit <i class="mdi mdi-home-plus me-1"></i>
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
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>

                        </div>

                        <h4 class="header-title mt-0 mb-4">No of Tenants</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 " data-bgColor="#4300A3" value=" {{ $tenants_num }}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                            </div>


                            <div class="widget-detail-1 text-end">
                                <a href="/tenants">
                                    <button type="submit" class="btn btn-success btn-xs text-white modal-btn capital-w" data-toggle="modal" data-target="=#exampleModal">Add Tenants <i class="mdi mdi-account-group me-1"></i>
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
                            <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="mdi mdi-dots-vertical"></i>
                            </a>

                        </div>

                        <h4 class="header-title mt-0 mb-4">No of Locations</h4>

                        <div class="widget-chart-1">
                            <div class="widget-chart-box-1 float-start" dir="ltr">
                                <input data-plugin="knob" data-width="70" data-height="70" data-fgColor="#f05050 " data-bgColor="#00FF12" value="{{ $properties }}" data-skin="tron" data-angleOffset="180" data-readOnly=true data-thickness=".15" />
                            </div>


                            <div class="widget-detail-1 text-end">

                                <!-- <h2 class="fw-normal pt-2 mb-1"> {{ $properties }} </h2> -->
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
                            <table id="datatable-buttons" class="table table-hover mb-0 dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tenant</th>
                                        <th>Mobile Number</th>
                                        <th>Email</th>
                                        <th>Occupation</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $counter = 0; @endphp
                                    @forelse ($tenants as $tenant)
                                    <tr>
                                        <td>{{ ++$counter }}</td>
                                        <td>{{ $tenant->first_name }} {{ $tenant->last_name }}</td>
                                        <td>{{ $tenant->phone }}</td>
                                        <td>{{ $tenant->email }}</td>
                                        <td>{{ $tenant->occupation }}</td>
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
        
        <!-- end row -->


        
        <!-- end row -->




    </div> <!-- container-fluid -->

</div> <!-- content -->
@endsection
@section('js')
<script src="dist/js/selectField.js"></script>
@endsection