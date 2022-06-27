@extends('layouts.auth')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6 col-xl-4">
            <div class="text-center">
                <a href="index.html">
                    <img src="assets/images/mytplus.png" alt="" height="50" class="mx-auto">
                </a>
                <!-- <p class="text-muted mt-2 mb-4">Responsive Admin Dashboard</p> -->
                <br><br><br>
            </div>
            <div class="card">

                <div class="card-body p-4">

                    <div class="text-center mb-4">
                        <h4 class="text-uppercase mt-0 mb-3">OTP Authentication</h4>
                        <p class="text-muted mb-0 font-13">Enter the OTP Sent to your Email.  </p>
                    </div>

                    <form action="#">

                        <div class="mb-3">
                            <label for="emailaddress" class="form-label">OTP</label>
                            <input class="form-control" type="text" id="otp" required="" placeholder="Enter the otp">
                        </div>

                        <div class="mb-3 text-center d-grid">
                            <button class="btn btn-primary" type="submit"> Submit </button>
                        </div>

                    </form>

                </div> <!-- end card-body -->
            </div>
            <!-- end card -->

            <div class="row mt-3">
                <div class="col-12 text-center">
                    <p class="text-muted">Back to <a href="/login" class="text-dark ml-1"><b>Log in</b></a></p>
                </div> <!-- end col -->
            </div>
            <!-- end row -->

        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>

@endsection
