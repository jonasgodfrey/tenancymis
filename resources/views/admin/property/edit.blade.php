@extends('layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">
            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">

                        <h4 class="page-title">Property Edit</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->


            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="header-title">Edit Property</h4>
                            <br>
                            {{-- Flash message --}}
                            <div id="alert">
                                @include('partials.flash')
                                @include('partials.modal')
                            </div>
                            {{-- Flash message end --}}
                            <form action="/property/update/{{$property->id}}" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="row">

                                    <div class="col-lg-6">

                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Property Name</label>
                                            <input type="text" name="property_name" id="simpleinput" class="form-control"
                                                placeholder="" value="{{ $property->property_name }}" required>
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
                                            <textarea maxlength="" name="property_description" class="form-control" rows="10" placeholder="Kindly describe your property"
                                                required>{{ $property->property_description }}</textarea>
                                        </div>

                                    </div> <!-- end col -->

                                    <div class="col-lg-6">
                                        <div class="mb-3">
                                            <label for="simpleinput" class="form-label">Address</label>
                                            <input type="text" name="address" id="simpleinput" class="form-control"
                                                placeholder="property address" value="{{ $property->property_address }}"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="example-email" class="form-label">Email</label>
                                            <input type="email" id="example-email" name="email" class="form-control"
                                                placeholder="Email" value="{{ $property->email }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-tel" class="form-label">Mobile No</label>
                                            <input type="tel" name="tel" id="example-tel" class="form-control"
                                                placeholder="contact no" value="{{ $property->phone }}" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">Country</label>
                                            <select class="form-select" id="example-select" name="country" required>
                                                <option style="display: none">{{ $property->country->country }}</option>
                                                @foreach ($countries as $country)
                                                    <option value="{{ $country->name }}">{{ $country->country }}</option>
                                                @endforeach
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="example-select" class="form-label">State</label>
                                            <select class="form-select" id="example-select" name="state" required>
                                                <option style="display: none">{{ $property->state->name }}</option>
                                                @foreach ($states as $state)
                                                    <option value="{{ $state->name }}">{{ $state->name }}</option>
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
                                        <div class="mb-3">
                                            <input type="submit" name="submit" class="btn btn-secondary btn-md"
                                                value="Save Changes">
                                            <a href="{{ route('property.index') }}" style="margin-left: 10px"
                                                class="btn btn-primary btn-md">Go Back</a>
                                        </div>
                                    </div>

                                </div>
                                <!-- end row-->
                            </form>
                        </div> <!-- end card-body -->
                    </div> <!-- end card -->
                </div><!-- end col -->
            </div>

        </div>
        <!-- container-fluid -->

    </div>
    <!-- content -->
@endsection
@section('js')
    <script src="dist/js/selectField.js"></script>
@endsection
