@extends('layouts.app')

@section('content')
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box page-title-box-alt">

                        <h4 class="page-title">Users</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between">
                                <div id="alert">
                                    @include('partials.flash')
                                    @include('partials.modal')
                                </div>

                                <div class="col-md-4">
                                    <div class="mt-3 mt-md-0">
                                        <button type="button" class="btn btn-success waves-effect waves-light"
                                            data-bs-toggle="modal" data-bs-target="#custom-modal">
                                            <i class="mdi mdi-plus-circle me-1"></i>Add Users</button>
                                    </div>
                                </div><!-- end col-->
                                <div class="col-md-8">
                                    <form class="d-flex flex-wrap align-items-center justify-content-sm-end">
                                        <label for="status-select" class="me-2">Sort By</label>
                                        <div class="me-sm-2">
                                            <select class="form-select my-1 my-md-0" id="status-select">
                                                <option selected="">All</option>
                                                <option value="1">Name</option>
                                                <option value="2">Post</option>
                                                <option value="3">Followers</option>
                                                <option value="4">Followings</option>
                                            </select>
                                        </div>
                                        <label for="inputPassword2" class="visually-hidden">Search</label>
                                        <div>
                                            <input type="search" class="form-control my-1 my-md-0" id="inputPassword2"
                                                placeholder="Search...">
                                        </div>
                                    </form>
                                </div>
                            </div> <!-- end row -->
                        </div>
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <!-- end row -->
            <div class="row">
                @forelse ($users as $user)
                      <div class="col-xl-4">
                    <div class="card">
                        <div class="text-center card-body">
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
                            <div>
                                <img src="/assets/images/user.png"
                                    class="rounded-circle avatar-xl img-thumbnail mb-2" alt="profile-image">

                                <p class="text-muted font-13 mb-3">
                                    Hi I'm {{$user->name}}, i am affiliated with the company as a {{$user->role}}.
                                </p>

                                <div class="text-start">
                                    
                                    <p class="text-muted font-13"><strong>Full Name :</strong> <span
                                            class="ms-2" style="text-transform:uppercase">{{$user->name}}</span></p>

                                    <p class="text-muted font-13"><strong>Mobile :</strong><span
                                            class="ms-2" style="text-transform:uppercase">{{$user->phone}}</span></p>

                                    <p class="text-muted font-13"><strong>Email :</strong> <span
                                            class="ms-2">{{$user->email}}</span></p>

                                    <p class="text-muted font-13"><strong>Role :</strong> <span
                                            class="ms-2">{{$user->role}}</span></p>
                                </div>

                                <button type="button" class="btn btn-primary rounded-pill waves-effect waves-light">Send
                                    Message</button>
                            </div>
                        </div>
                    </div>


                </div> <!-- end col -->
                @empty
                    
                @endforelse
              

            </div>
            <!-- end row -->


        </div> <!-- container -->
        <div class="modal fade" id="custom-modal" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header bg-light">
                        <h4 class="modal-title" id="myCenterModalLabel">Add User</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"></button>
                    </div>
                    <div class="modal-body">
                        <form role="form" action="{{ route('users.store') }}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" name="name" id="name" placeholder="Enter name"
                                    required>
                            </div>
                            <div class="mb-3" id="role">
                                <label for="position" class="form-label">Position</label>
                                <select class="form-select" id="example-select" name="role" required>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->name }}">{{ $role->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="company" class="form-label">Property</label>
                                <select class="form-select" id="example-select" name="propid" required>
                                    @foreach ($properties as $property)
                                        <option value="{{ $property->id }}">{{ $property->propname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email address</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="Enter email" required>
                            </div>

                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Phone Number</label>
                                <input type="tel" name="phone" class="form-control" id="exampleInputEmail1"
                                    placeholder="Phone Number" required>
                            </div>
                            <div class="mb-3 bizname">
                                <label for="name" class="form-label">Business Name</label>
                                <input type="text" class="form-control" name="bizname" id="bizname"
                                    placeholder="Enter name" >
                            </div>
                            <div class="mb-3 vencat">
                                <label for="company" class="form-label">Vendor Category</label>
                                <select class="form-select " id="example-select" name="vencat" >
                                    <option value="1">Electrical</option>
                                    <option value="2">Furniture</option>
                                    <option value="3">Carpenter</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-success waves-effect waves-light">Save</button>
                            <button type="button" class="btn btn-danger waves-effect waves-light"
                                data-bs-dismiss="modal">Cancel</button>
                        </form>
                    </div>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    </div>
@endsection
@section('js')
    <script src="/assets/js/users.js"></script>
@endsection
