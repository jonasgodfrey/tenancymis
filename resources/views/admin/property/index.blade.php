@extends('layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->

            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">

                        <h4 class="page-title"> Property</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Create Property</h4>
                            <br>
                            {{-- Flash message --}}
                            <div id="alert">
                                @include('partials.flash')
                                @include('partials.modal')
                            </div>
                            {{-- Flash message end --}}
                            <form role="form" action="{{ route('property.store') }}" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Property Name</label>
                                            <input type="text" name="propname" id="simpleinput" class="form-control"
                                                placeholder="" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Property Category</label>
                                            <select class="form-select" id="example-select" name="propcat" required>
                                                <option style="display: none">Select Category</option>
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
                                                    <option value="{{ $type->id }}">{{ $type->typename }}</option>
                                                @endforeach
                                                <option value="1">Others</option>

                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Description</label>
                                            <textarea maxlength="" name="propdesc" class="form-control" rows="10" placeholder="Kindly describe your property"
                                                required></textarea>
                                        </div>

                                    </div> <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Address</label>
                                            <input type="text" name="address" id="simpleinput" class="form-control"
                                                placeholder="property address" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Email</label>
                                            <input type="email" id="example-email" name="email" class="form-control"
                                                placeholder="Email" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-tel" class="form-label">Mobile No</label>
                                            <input type="tel" name="tel" id="example-tel" class="form-control"
                                                placeholder="contact no" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Country</label>
                                            <select class="form-select" id="example-select" name="country" required>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->id }}">{{ $country->name }}</option>
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
                                            <input type="file" name="logo" id="example-fileinput"
                                                class="form-control">
                                        </div>

                                    </div> <!-- end col -->

                                    <div class="col-12">
                                        <button type="submit" name="submit"
                                            class="btn btn-primary btn-md">Create</button>
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
                                        <th>Property</th>                                        
                                        <th>Category</th>
                                        <th>Description</th>
                                        <th>State</th>
                                        <th>Contact Email</th>
                                        <th>Tel</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>


                                <tbody>
                                    @forelse ($properties as $property)
                                        <tr>
                                            <td>{{ $property->propname }}</td>
                                            <td>{{ $property->category->category_name }}</td>                                            
                                            <td>{{ $property->propdesc }}</td>
                                            <td>{{ $property->state->name }}</td>                                            
                                            <td>{{ $property->email }}</td>
                                            <td>{{ $property->phone }}</td>
                                            <td>
                                                <div class="row">

                                                    <div class="col-md-3">
                                                        <a href="#"><i class="fas fa-eye"></i></a>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <a href="/property/edit/{{ $property->id }}"><i
                                                                class="fas fa-pen"></i></a>
                                                    </div>
                                                    <!--modal begin-->

                                                    <div class="col-md-3">
                                                        <i class="fa fa-trash delete" id="{{ $property->id }}"
                                                            style="color: red"></i>
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

    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
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
