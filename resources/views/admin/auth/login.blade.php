@extends('layouts.auth')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="text-center">
                <a href="index.html">
                    <img src="assets/images/mytplus.png" alt="" height="50" class="mx-auto">
                </a>
            <!-- <p class="text-muted mt-2 mb-4">User Sign in</p> -->
            <br><br><br>

            </div>
            <div class="card">
                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <h4 class="text-uppercase mt-0">Sign In</h4>
                    </div>
                    <div>
                        @include('partials.flash')
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">Email address</label>
                            <input class="form-control" name="email" type="email" id="emailaddress" required="" placeholder="Enter your email">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input class="form-control" name="password" type="password" required="" id="password" placeholder="Enter your password">
                        </div> 

                        <div class="mb-3">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkbox-signin" checked>
                                <label class="form-check-label" for="checkbox-signin">Remember me</label>
                            </div>
                        </div>

                        <div class="mb-3 d-grid text-center">
                            <button class="btn btn-primary" type="submit"> Log In </button>
                        </div>
                    </form>

                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p> <a href="/forgot-password" class="ms-1"><i class="fa fa-lock me-1"></i>Forgot your password?</a></p>
                    <p class="">Don't have an account? <a href="/register" class="text-dark ms-1"><b>Sign Up</b></a></p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
@endsection
