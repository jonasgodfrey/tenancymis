@extends('layouts.app')

@section('content')
<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->

        <div class="row">
            <div class="col-12">
                <div class="page-title-box page-title-box-alt">

                    <h4 class="page-title">Units</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->
        <div id="alert">
            @include('partials.flash')
            @include('partials.modal')
        </div>
        <div class="row">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add a single unit</h5>
                        <p class="card-text">Add the data for a single individual unit to your portal.</p>
                        <br>
                        <br>
                        <a href="#" class="btn btn-primary single-unit-btn">Add Unit</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Add multiple units <b class="text-danger">(new)</b></h5>
                        <p class="card-text">Add units in multiple groups through our unique feature of auto generation,
                            we generate the units for you based on your requirements saving you a little hassle, just
                            tell us the number of units you need for each group and we would auto generate</p>
                        <a href="#" class="btn btn-primary multi-unit-btn">Generate Units</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card single-unit-card">
                    <div class="card-body">
                        <h4 class="header-title">Add Single Unit</h4>
                        <br>


                        <form role="form" action="{{ route('units.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">


                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Select Property</label>
                                        <select class="form-select" name="property_name" id="example-select" required>
                                            <option style="display: none">Select Property</option>
                                            @foreach ($properties as $property)
                                            <option value="{{ $property->id }}">{{ $property->property_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Unit Type</label>
                                        <select class="form-select" name="unittype" id="example-select" required>
                                            <option style="display: none">Select Unit Type</option>
                                            @foreach ($unitstype as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->unit_type }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="example-password" class="form-label">Unit Name</label>
                                        <input type="text" name="unitname" id="example-password" class="form-control" value="" placeholder="" required>
                                    </div>


                                </div> <!-- end col -->

                                <div class="col-lg-6">


                                    <div class="mb-3">
                                        <label for="example-password" class="form-label">Unit Description</label>
                                        <input type="tel" name="unit_description" id="" class="form-control" value="" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-password" class="form-label">Rent/Lease Amount</label>
                                        <input type="text" name="rentamount" id="example-password" class="form-control" placeholder="₦100,000/Year" required>
                                    </div>


                                    <div class="mb-3">
                                        <label for="example-fileinput" class="form-label">Unit Picture</label>
                                        <input type="file" name="unitpics" id="example-fileinput" class="form-control">
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
            <div class="col-12">
                <div class="card multi-unit-card">
                    <div class="card-body">
                        <h4 class="header-title">Add Multiple Units</h4>
                        <br>

                        <form role="form" action="{{ route('units.store_multiple') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-lg-6">


                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Select Property</label>
                                        <select class="form-select" name="property_name" id="example-select required>
                                            <option style=" display:none">Select
                                            Property</option>
                                            @foreach ($properties as $property)
                                            <option value="{{ $property->id }}">{{ $property->property_name }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-select" class="form-label">Unit Type</label>
                                        <select class="form-select" name="unittype" id="example-select" required>
                                            <option style="display: none">Select Unit Type</option>
                                            @foreach ($unitstype as $unit)
                                            <option value="{{ $unit->id }}">{{ $unit->unit_type }}</option>
                                            @endforeach

                                        </select>
                                    </div>


                                    <div class="mb-3">
                                        <label for="example-password" class="form-label">Unit Name <span class="text-danger">(would be used for all units in this group)</span></label>
                                        <input type="text" name="unitname" id="example-password" class="form-control" value="" placeholder="" required>
                                    </div>


                                    <div class="mb-3">
                                        <label for="example-password" class="form-label">Number of units</label>
                                        <input type="text" name="multiple_unit_count" id=" multi-unitno" class="form-control" value="" required>
                                    </div>

                                </div> <!-- end col -->

                                <div class="col-lg-6">


                                    <div class="mb-3">
                                        <label for="example-password" class="form-label">Unit Description</label>
                                        <input type="tel" name="unit_description" id="" class="form-control" value="" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="example-password" class="form-label">Rent/Lease Amount</label>
                                        <input type="text" name="rentamount" id="example-password" class="form-control" placeholder="₦100,000/Year" required>
                                    </div>


                                    <div class="mb-3">
                                        <label for="example-fileinput" class="form-label">Unit Picture</label>
                                        <input type="file" name="unitpics" id="example-fileinput" class="form-control" </div>
                                    </div> <!-- end col -->

                                </div>
                                <!-- end row-->
                                <div class="mb-3">
                                    <button type="submit" id="gen_btn" name="submit" class="btn btn-success btn-md">Generate Units</button>
                                </div>
                        </form>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div>
        </div>
        <!-- end row -->


        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Units</h4>
                        <br>
                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap">
                            <thead>
                                <tr>
                                    <th>S/No</th>
                                    <th>Unit</th>
                                    <th>Description</th>
                                    <th>Property</th>
                                    <th>Amount/Year</th>
                                    <th>Action</th>
                                </tr>
                            </thead>


                            <tbody>
                                @php $counter = 0; @endphp
                                @forelse ($units as $unit)
                                <tr>
                                    <td>{{ ++$counter }}</td>
                                    <td>{{ $unit->name }}</td>
                                    <td>{{ $unit->unit_description }}</td>
                                    <td>{{ $unit->property->property_name }}</td>
                                    <td>@money($unit->lease_amount)</td>
                                    @if ($unit->status == 'occupied')
                                    <td><span class="badge bg-secondary">{{ $unit->status }}</span></td>
                                    @endif
                                    @if ($unit->status == 'empty')
                                    <td><span class="badge bg-success">{{ $unit->status }}</span></td>
                                    @endif
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
                                @endforelse

                            </tbody>
                        </table>
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
<script>
    $(".single-unit-card").hide();
    $(".multi-unit-card").hide();


    $(".single-unit-btn").click(function() {
        $(".single-unit-card").toggle();
        $(".multi-unit-card").hide();
    });

    $(".multi-unit-btn").click(function() {
        $(".single-unit-card").hide();
        $(".multi-unit-card").toggle();
    });



    $('#multi_unitno').keyup(function() {
        // Update the button text with the current value of the input field
        $('#gen-btn').html($(this).val());
    });
</script>
@endsection