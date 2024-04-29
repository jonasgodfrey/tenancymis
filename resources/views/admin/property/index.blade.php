@extends('layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->

        <div class="row">
            <div class="col-md-6">
                <div class="page-title-box page-title-box-alt">
                    <h4 class="page-title">Property</h4>
                </div>
            </div>
            <div class="col-md-6">
                <div class="page-title-box page-title-box-alt">
                    <div style="flex-direction:row; justify-content: flex-end;">
                        <h4 class="page-title" style="text-align: right;">
                            <button id="show-add-tenant" name="submit" class="btn btn-primary btn-md">
                                Create Property</button>
                        </h4>


                    </div>

                </div>
            </div>
        </div>
        <!-- end page title -->

        {{-- Flash message --}}
        <div id="alert">
            @include('partials.flash')
            @include('partials.modal')
        </div>
        {{-- Flash message end --}}

        <div class="row" id="add-property-div" style="display: none;">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title">Create Property</h4>
                        <br>

                        <form role="form" action="{{ route('property.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-lg-6">

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Property Name</label>
                                        <input type="text" name="property_name" id="simpleinput" class="form-control" placeholder="" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Property Category</label>
                                        <select class="form-select" id="example-select" name="propcat" required>
                                            <option style="display: none" value="">Select Category</option>
                                            @foreach ($prop_cats as $cat)
                                            <option value="{{ $cat->id }}">{{ $cat->category_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Property Type</label>
                                        <select class="form-select" id="example-select" name="proptype" required>
                                            <option style="display: none">Select Type</option>
                                            @foreach ($prop_types as $type)
                                            <option value="{{ $type->id }}">{{ $type->property_type }}</option>
                                            @endforeach
                                            <option value="1">Others</option>

                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Description</label>
                                        <textarea maxlength="" name="property_description" class="form-control" rows="10" placeholder="Kindly describe your property" required></textarea>
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">
                                    <div class="mb-3">
                                        <label for="simpleinput" class="form-label">Address</label>
                                        <input type="text" name="address" id="simpleinput" class="form-control" placeholder="property address" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="example-email" class="form-label">Email</label>
                                        <input type="email" id="example-email" name="email" class="form-control" placeholder="Email" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-tel" class="form-label">Mobile No</label>
                                        <input type="tel" name="tel" id="example-tel" class="form-control" placeholder="contact no" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Country</label>
                                        <select class="form-select" id="example-select" name="country" required>
                                            @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->country }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">State</label>
                                        <select class="form-select" id="example-select" name="state" required>
                                            @foreach ($states as $state)
                                            <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-fileinput" class="form-label">Upload Logo</label>
                                        <input type="file" name="logo" id="example-fileinput" class="form-control">
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-12">
                                    <button type="submit" name="submit" class="btn btn-primary btn-md">Create</button>
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
                        <h4 class="mt-0 header-title">Properties</h4>
                        <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>Property Image</th>
                                    <th>Property</th>
                                    <th>Category</th>
                                    <th>Address</th>
                                    <th>Units</th>
                                    <th>Tenants</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                @forelse ($properties as $property)
                                <tr>
                                    <td><img src="{{ $property->property_image_url }}" alt="img" width="100" class="mx-auto d-block" /></td>
                                    <td>{{ $property->property_name }}</td>
                                    <td>{{ $property->category_name }}</td>
                                    <td>{{ $property->property_address }}</td>
                                    <td>{{$property->total_units}}</td>
                                    <td>{{$property->total_tenants}}</td>
                                    <td>

                                        <div class="dropdown">
                                            <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                Action &nbsp; <i class="fas fa-caret-down"></i>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a class="dropdown-item" href="/properties/{{$property->id}}/units">View Units</a></li>
                                                <li><button class="dropdown-item" onclick="confirmDelete('{{$property->id}}')">Delete</button></li>
                                                <li><a class="dropdown-item" href="/properties/edit/{{ $property->id }}">Edit</a></li>
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
<script src="/assets/js/properties.js"></script>

<script>
    $('#show-add-tenant').on('click', function() {
        $('#add-property-div').toggle();
    })
</script>
@endsection