@extends('layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->

        <div class="row">
            <div class="col-md-6">
                <div class="page-title-box page-title-box-alt">

                    <h4 class="page-title"> Tenant Records for {{$tenantRecords[0]->first_name}} {{$tenantRecords[0]->last_name}}</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="page-title-box page-title-box-alt">
                    <div style="flex-direction:row; justify-content: flex-end;">
                        <h4 class="page-title" style="text-align: right;">
                            <button id="show-add-tenant" name="submit" class="btn btn-primary btn-md">
                                Add Tenant to Unit</button>
                        </h4>


                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        <div id="alert">
            @include('partials.flash')
            @include('partials.modal')
        </div>


        <div class="row" id="add-tenants-div" style="display: none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Assign Tenant</h4>
                        <br>

                        <div class="row">
                            <form role="form" action="{{ route('tenants.store') }}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row" style="margin-bottom: 20px;">
                                    <div class="col-lg-6 ">
                                        <label for="example-select" class="form-label">Existing or New Tenant?</label>
                                        <select class="form-select" id="assignment_type" name="assign_type" required>
                                            <option>-- Select Option --</option>
                                            <option value="existing">Existing</option>
                                            <option value="new">New</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="row" id="newTenantDiv" style="display: none;">
                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's First Name</label>
                                            <input type="text" name="new_tenant_first_name" id="new_tenant_first_name" class="form-control" placeholder="">
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Last Name</label>
                                            <input type="text" name="new_tenant_last_name" id="new_tenant_last_name" class="form-control" placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Mobile No</label>
                                            <input type="tel" name="new_mobile" id="new_mobile" class="form-control" placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Email</label>
                                            <input type="text" name="new_email" id="new_email" class="form-control" placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Occupation</label>
                                            <input type="text" name="new_business_name" id="new_business_name" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row" id="existingTenantDiv" style="display: none;">

                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Mobile No</label>
                                            <input type="tel" name="mobile" id="mobile" class="form-control" placeholder="" disabled>
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Email</label>
                                            <input type="text" name="email" id="email" class="form-control" placeholder="" disabled>
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Occupation</label>
                                            <input type="text" name="business_name" id="business_name" class="form-control" disabled placeholder="">
                                        </div>
                                    </div>

                                    <div class="row" id="otherFormDiv" style="display: none;">

                                        <div class="mb-3 col-lg-6">
                                            <label for="example-select" class="form-label ">Units</label>
                                            <select class="form-select units" name="unit" id="unit" disabled required>
                                                <option style="display: none">loading..</option>

                                            </select>
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="example-select" class="form-label">Occupancy Category</label>
                                            <select class="form-select" id="example-select" name="bizcat" required>
                                                @foreach ($property_categories as $property)
                                                <option value="{{ $property->id }}">{{ $property->category_name }} Purpose</option>
                                                @endforeach
                                            </select>
                                        </div>


                                        <div class="mb-3 col-lg-6">
                                            <label for="example-date" class="form-label">Start Date</label>
                                            <input type="date" id="example-date" name="start_date" class="form-control" placeholder="Select Date" required>
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <button type="submit" name="submit" class="btn btn-primary btn-md">Create
                                            Tenant</button>
                                    </div>
                                </div>
                                <!-- end row-->
                            </form>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>



        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body table-responsive">
                        <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>S/No</th>
                                    <th>Unit Name</th>
                                    <th>Unit Description</th>
                                    <th>Property Name</th>
                                    <th>Start Date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $count = 0; @endphp

                                @forelse ($tenantRecords as $tenant)
                                <tr>

                                    <td>{{++$count}}</td>
                                    <td>{{$tenant->name}}</td>
                                    <td>{{$tenant->unit_description}}</td>
                                    <td>{{$tenant->property_name}}</td>
                                    <td>{{$tenant->start_date}}</td>
                                    <td><span class="badge rounded-pill bg-{{$tenant->status == 1 ? 'success' : 'danger'}}" style="padding: 7px;"> {{$tenant->status == 1 ? "Occupied": "Vacant"}}</span></td>
                                    <td style="width:20%">
                                        <a href="{{route('tenants.records', ['tenantId' => $tenant->id])}}" class="btn btn-info" style="margin-right: 20px;"><i class="fas fa-eye"></i> Rent Records</a>
                                        <a href="#" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                                    </td>

                                </tr>
                                @empty
                                <!-- <h6 class="text-center">no tenants yet</h6> -->
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