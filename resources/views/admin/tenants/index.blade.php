@extends('layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">

                        <h4 class="page-title"> Tenants</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Assign Tenant</h4>
                            <br>
                            <div id="alert">
                                @include('partials.flash')
                                @include('partials.modal')
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <form role="form" action="{{ route('tenants.store') }}" enctype="multipart/form-data" method="POST">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Tenant's Name</label>
                                            <input type="text" name="tenantname" id="simpleinput" class="form-control"
                                                placeholder="" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Tenant's Mobile No</label>
                                            <input type="text" name="mobile" id="simpleinput" class="form-control"
                                                placeholder="" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Tenant's Email</label>
                                            <input type="text" name="email" id="simpleinput" class="form-control"
                                                placeholder="" required>
                                        </div>





                                </div> <!-- end col -->

                                <div class="col-lg-6">


                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Tenant's Occupation</label>
                                        <input type="text" name="bizname" id="simpleinput" class="form-control"
                                            placeholder="" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Occupancy Category</label>
                                        <select class="form-select" id="example-select" name="bizcat" required>
                                            <option>Residential</option>    
                                            <option>Business</option>                                           
                                            
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label ">Select Property</label>
                                        <select class="form-select propname" name="propname" id="example-select" required>
                                            <option style="display: none">Select Property</option>
                                            @foreach ($properties as $property)
                                                <option value="{{ $property->id }}">{{ $property->propname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-select" class="form-label ">Units</label>
                                        <select class="form-select units" name="unit" id="example-select units"
                                            name="units" disabled required>
                                            <option style="display: none">loading..</option>
                                               
                                        </select>
                                    </div>
                                  
                                </div> <!-- end col -->

                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-md">Create
                                        Tenant</button>
                                </div>

                            </div>
                            <!-- end row-->
                        </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>
            <!-- end row -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="mt-0 header-title">Tenants</h4>
                            <br>
                            <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                                <thead>
                                    <tr>
                                        <th>Tenant</th>
                                        <th>Email</th>
                                        <th>Phone</th>    
                                        <th>Unit Assigned</th>
                                        <th>Property</th>                                        
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($tenants as $tenant)
                                    <tr>
                                        
                                        <td>{{$tenant->name}}</td>
                                        <td>{{$tenant->email}}</td>
                                        <td>{{$tenant->phone}}</td>                                        
                                        <td>{{$tenant->unit->name}}</td>
                                        <td>{{$tenant->property->propname}}</td>
                                        <td>
                                                <div class="row">
                                                    <div class="col-6">
                                                        <a href="#"><i class="fas fa-eye"></i></a>
                                                    </div>
                                                    <div class="col-6">
                                                        <span><a href="#"><i class="fas fa-pen"></i></a></span>
                                                    </div>
                                                </div>
                                            </td>
                                       
                                    </tr>
                                    @empty
                                    <h6 class="text-center">no tenants yet</h6>
                                    @endforelse

                                   

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->




        </div> <!-- container-fluid -->

    </div>
@endsection
@section('js')
    <script src="/assets/js/tenants.js"></script>
@endsection
