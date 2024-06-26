@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
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
                                <label for="first_name" class="form-label">First Name</label>
                                <input class="form-control" type="text" name="first_name" id="first_name"
                                    placeholder="Enter your first name" required>
                            </div>
                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input class="form-control" type="text" name="last_name" id="last_name"
                                    placeholder="Enter your last name" required>
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
                                <label for="tel" class="form-label">What do you need MyTenancyPlus for?</label>
                                <select class="form-control" name="purpose"  id="selectcat"
                                    placeholder="Enter your tel">
                                    <option value="">Kindly Select</option>                                    
                                    <option value="Tenancy Management">Tenancy Management</option>                                   
                                    <option value="Plaza Management">Plaza Management</option>
                                    <option value="Artisan Management">Artisans Management</option>
                                    <option value="Shortlet Services">Shortlets Services</option>
                                    <option value="Land Banking">Land Banking</option> 
                                    <option value="Build to Sell">Build to Sell</option>                             
                                                                       
                                </select>
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
