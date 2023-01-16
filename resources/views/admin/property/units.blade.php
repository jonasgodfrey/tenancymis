@extends('layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->

        <div class="row">
            <div class="col-md-6">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title"> All Units in {{$property->propname}}</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="page-title-box page-title-box-alt">
                    <div style="flex-direction:row; justify-content: flex-end;">
                        <h4 class="page-title" style="text-align: right;">
                            <button id="show-add-tenant" name="submit" class="btn btn-primary btn-md">
                                Add Tenant to Unit</button>
                            <button id="show-add-unit" name="submit" class="btn btn-primary btn-md">
                                Add Unit</button>
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
                                        <input type="hidden" name="propname" value="{{$property->id}}" id="propname" required>

                                    </div>
                                </div>
                                <div class="row">
                                    <div class="row" id="newTenantDiv" style="display: none;">
                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Name</label>
                                            <input type="text" name="new_tenant_name" id="new_tenant_name" class="form-control" placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Mobile No</label>
                                            <input type="text" name="new_mobile" id="new_mobile" class="form-control" placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Email</label>
                                            <input type="text" name="new_email" id="new_email" class="form-control" placeholder="">
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Occupation</label>
                                            <input type="text" name="new_bizname" id="new_bizname" class="form-control" placeholder="">
                                        </div>
                                    </div>

                                    <div class="row" id="existingTenantDiv" style="display: none;">

                                        <div class="mb-3 col-lg-6">
                                            <label for="example-select" class="form-label ">Select Existing User</label>
                                            <select class="form-select selected_user" name="selected_user" id="selected_user">
                                                <option style="display: none">Select User</option>
                                                @foreach ($users as $user)
                                                <option value="{{ $user->id }}">{{ $user->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Mobile No</label>
                                            <input type="text" name="mobile" id="mobile" class="form-control" placeholder="" disabled>
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Email</label>
                                            <input type="text" name="email" id="email" class="form-control" placeholder="" disabled>
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="simpleinput" class="form-label">Tenant's Occupation</label>
                                            <input type="text" name="bizname" id="bizname" class="form-control" disabled placeholder="">
                                        </div>
                                    </div>

                                    <div class="row" id="otherFormDiv" style="display: none;">

                                        <div class="mb-3 col-lg-6">
                                            <label for="example-select" class="form-label ">Units</label>
                                            <select class="form-select units" name="unit" id="unit" required>
                                                <option value="">Select Property</option>
                                                @foreach ($units as $unit)
                                                <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3 col-lg-6">
                                            <label for="example-select" class="form-label">Occupancy Category</label>
                                            <select class="form-select" id="example-select" name="bizcat" required>
                                                <option>Residential</option>
                                                <option>Business</option>

                                            </select>
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

        <div class="row" id="add-unit-div" style="display: none;">
            <div class="col-12">
                <div class="card single-unit-card">
                    <div class="card-body">
                        <h4 class="header-title">Add Single Unit</h4>
                        <br>
                        <div id="alert">
                            @include('partials.flash')
                            @include('partials.modal')
                        </div>

                        <form role="form" action="{{ route('units.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Unit Type</label>
                                        <select class="form-select" name="unittype" id="example-select" required>
                                            <option style="display: none">Select Unit Type</option>
                                            @foreach ($unitstype as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="example-password" class="form-label">Unit Name</label>
                                        <input type="text" name="unitname" id="example-password" class="form-control" value="" placeholder="" required>
                                        <input type="hidden" name="propname" value="{{$property->id}}" id="propname" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-fileinput" class="form-label">Unit Picture</label>
                                        <input type="file" name="unitpics" id="example-fileinput" class="form-control">
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">


                                    <div class="mb-3">
                                        <label for="example-password" class="form-label">Unit Description</label>
                                        <input type="tel" name="unitdesc" id="" class="form-control" value="" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-password" class="form-label">Rent/Lease Amount</label>
                                        <input type="text" name="rentamount" id="example-password" class="form-control" placeholder="₦100,000/Year" required>
                                    </div>

                                </div> <!-- end col -->
                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn btn-success btn-md">Add
                                        Unit</button>
                                </div>
                            </div>
                            <!-- end row-->
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->

        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Unit name</th>
                                    <th>Description</th>
                                    <th>Rent/Lease Amount</th>
                                    <th>Status</th>
                                    <th>Date Created</th>
                                    <th>Action</th>
                                </tr>
                            </thead>

                            <tbody>
                                @forelse ($units as $unit)
                                <tr>
                                    <td><img src="{{asset('storage/unit/'.$unit->image)}}" alt="img" width="100" class="mx-auto d-block" /></td>
                                    <td>{{ $unit->name }}</td>
                                    <td>{{ $unit->unitDesc }}</td>
                                    <td>@money($unit->leaseAmount)</td>
                                    <td>{{ $unit->status }}</td>
                                    <td>{{ $unit->created_at }}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action &nbsp; <i class="fas fa-caret-down"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/units/{{$unit->id}}">Unit Details</a></li>
                                                <li><a class="dropdown-item" href="#">Delete</a></li>
                                                <li><a class="dropdown-item" href="/properties/edit/{{ $unit->id }}">Edit</a></li>
                                            </ul>
                                        </div>


                                    </td>
                                </tr>
                                @empty
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
<script src="/assets/js/units.js"></script>
@endsection