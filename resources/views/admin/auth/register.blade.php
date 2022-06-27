@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-4">
                <div class="text-center">
                    <a href="index.html">
                        <img src="assets/images/mytplus.png" alt="" height="50" class="mx-auto">
                    </a>
                    <p class="text-muted mt-2 mb-4"></p>
                </div>
                <div class="card">

                    <div class="card-body p-4">

                        <div class="text-center mb-4">
                            <h4 class="text-uppercase mt-0">Register</h4>
                        </div>
                        <div>
                            @include('partials.flash')
                        </div>

                        <form method="POST" action="/register">
                            @csrf
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Full Name</label>
                                <input class="form-control" type="text" name="name" id="fullname"
                                    placeholder="Enter your name" required>
                            </div>
                            <div class="mb-3">
                                <label for="emailaddress" class="form-label">Email address</label>
                                <input class="form-control" name="email" type="email" id="emailaddress" required
                                    placeholder="Enter your email">
                            </div>
                            <div class="mb-3">
                                <label for="tel" class="form-label">Phone Number</label>
                                <input class="form-control" name="phone" type="tel" id="tel" required
                                    placeholder="Enter your tel">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input class="form-control" name="password" type="password" required id="password"
                                    placeholder="Enter your password">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Confirm Password</label>
                                <input class="form-control" name="password_confirmation" type="password" required
                                    id="password" placeholder="Enter your password">
                            </div>
                            <div class="mb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkbox-signup">
                                    <label class="form-check-label" for="checkbox-signup">I accept <a
                                            href="javascript: void(0);" class="text-dark">Terms and
                                            Conditions</a></label>
                                </div>
                            </div>
                            <div class="mb-3 text-center d-grid">
                                <button class="btn btn-primary" type="submit"> Sign Up </button>
                            </div>

                        </form>

                    </div> <!-- end card-body -->
                </div>
                <!-- end card -->

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <p class="" style="color: black">Already have account? <a
                                href="{{ route('login') }}" class="text-dark ms-1"><b style="color: black">Sign In</b></a>
                        </p>
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- end col -->
        </div>
        <!-- end row -->
    </div>
    <!-- end container -->
@endsection
