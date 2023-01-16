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
                                            <label for="example-select" class="form-label ">Select Property</label>
                                            <select class="form-select propname" name="propname" id="propname" required>
                                                <option style="display: none">Select Property</option>
                                                @foreach ($properties as $property)
                                                <option value="{{ $property->id }}">{{ $property->propname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3 col-lg-6">
                                            <label for="example-select" class="form-label ">Units</label>
                                            <select class="form-select units" name="unit" id="unit" disabled required>
                                                <option style="display: none">loading..</option>

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
                                    <td>{{ $unit->leaseAmount }}</td>
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
<script src="/assets/js/tenants.js"></script>

<script>
    $('#add-property-div').hide();

    $('#show-add-unit').on('click', function(e) {
        $('#add-property-div').toggle();

    });
    $('#assignment_type').on('change', function(e) {
        if (e.target.value == "new") {
            $('#newTenantDiv').show();
            $('#existingTenantDiv').hide();
            $('#otherFormDiv').show();
        } else if (e.target.value == "existing") {
            $('#newTenantDiv').hide();
            $('#otherFormDiv').show();
            $('#existingTenantDiv').show();
        } else {
            $('#newTenantDiv').hide();
            $('#otherFormDiv').hide();
            $('#existingTenantDiv').hide();
        }
    });


    $('#selected_user').on('change', function(e) {

        var userid = e.target.value;

        $.ajax({
                url: "/users/" + userid,
                type: 'GET',
                data: {
                    id: e.target.value
                },
            })
            .done(function(response) {
                console.log(response);

                $("#mobile").val(response.data.phone)
                $("#email").val(response.data.email)
                $("#bizname").val(response.data.occupation)


                // swal.fire('Fetched!', response.message, response.status);
                // location.reload('2000');
            })
            .fail(function(error) {
                console.log(error);
                swal.fire('Oops...',
                    'Something went wrong when deleting !',
                    'error');
            });
    });

    $('#show-add-tenant').on('click', function(e) {
        $('#add-tenants-div').toggle();

    });
    $(document).ready(function() {
        $('.alert').alert()

        $('.delete').click(function() {
            $(document).on('click', '.delete', function() {
                var id = $(this).attr('id');
                console.log(id);
                swal.fire({
                    title: 'Are you sure?',
                    text: "All units and tenants under this property would also be deleted !!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!',
                }).then((result) => {
                    if (result.value) {
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]')
                                    .attr('content')
                            }
                        });
                        $.ajax({
                                url: "{{ route('property.delete')}}",
                                type: 'POST',
                                data: {
                                    id: id
                                },
                            })
                            .done(function(response) {
                                console.log(response);
                                swal.fire('Deleted!', response, response
                                    .status);
                                location.reload('2000');
                            })
                            .fail(function(error) {
                                console.log(error);
                                swal.fire('Oops...',
                                    'Something went wrong when deleting !',
                                    'error');
                            });
                    }
                })
            });
        });
    });
</script>
@endsection