@extends('layouts.app')

@section('content')
<div class="content">

<div class="container-fluid">
                        
                        <!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box page-title-box-alt">
            
            <h4 class="page-title">Subscription</h4>
        </div>
    </div>
</div>     
<!-- end page title --> 

                        <div class="row mt-2 justify-content-center">
                            <div class="col-lg-10">
                                <div class="row">
                                    
                                    <!--Pricing Column-->
                                    <article class="pricing-column col-xl-4 col-md-6">
                                        <div class="card">
                                            <div class="inner-box card-body">
                                                <div class="plan-header p-3 text-center">
                                                    <h3 class="plan-title">Basic</h3>
                                                    <h2 class="plan-price fw-normal">₦300.00 Per Unit</h2>
                                                    <div class="plan-duration">Per Month</div>
                                                </div>
                                                <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                    <li>Unlimited Properties</li>
                                                    <li>Unlimited Managers</li>
                                                    <li>Unlimited Tenants</li>
                                                    <li>Unlimited Artisans</li>
                                                    <li>Unlimited Notification/Reminders</li>
                                                    <li>24x7 Support</li>
                                                </ul>
    
                                                <div class="text-center">
                                                    <a href="https://paystack.com" class="btn btn-bordered-success btn-success rounded-pill waves-effect waves-light">Pay Now</a>
                                                </div>
                                            </div>
                                        </div>
                                    </article>


                                    <!--Pricing Column-->
                                    <article class="pricing-column col-xl-4 col-md-6">
                                        <div class="ribbon"><span>POPULAR</span></div>
                                        <div class="card">
                                        <div class="inner-box card-body">
                                            <div class="plan-header p-3 text-center">
                                                <h3 class="plan-title">Premium</h3>
                                                <h2 class="plan-price fw-normal">₦3,480 Per Unit</h2>
                                                <div class="plan-duration">Per Year</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                    <li>Unlimited Properties</li>
                                                    <li>Unlimited Managers</li>
                                                    <li>Unlimited Tenants</li>
                                                    <li>Unlimited Artisans</li>
                                                    <li>Unlimited Notification/Reminders</li>
                                                    <li>Market Place Listing</li>
                                                    <li>24x7 Support</li>
                                                </ul>

                                            <div class="text-center">
                                                <a href="https://paystack.com" class="btn btn-success btn-bordered-success rounded-pill waves-effect waves-light">Pay Now</a>
                                            </div>
                                        </div>
                                        </div>
                                    </article>

                                    <!--Pricing Column-->
                                    <article class="pricing-column col-xl-4 col-md-6">
                                        <div class="ribbon"><span>One Off</span></div>
                                        <div class="card">
                                        <div class="inner-box card-body">
                                            <div class="plan-header p-3 text-center">
                                                <h3 class="plan-title">Executive</h3>
                                                <h2 class="plan-price fw-normal">₦5,500,000</h2>
                                                <div class="plan-duration">One off Sale</div>
                                            </div>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                    <li>Unlimited Properties</li>
                                                    <li>Unlimited Managers</li>
                                                    <li>Unlimited Tenants</li>
                                                    <li>Unlimited Artisans</li>
                                                    <li>Unlimited Notification/Reminders</li>
                                                    <li>Training of Stakeholders</li>
                                                </ul>

                                            <div class="text-center">
                                                <a href="https://paystack.com" class="btn btn-success btn-bordered-success rounded-pill waves-effect waves-light">Pay Now</a>
                                            </div>
                                        </div>
                                        </div>
                                    </article>


                                    

                                </div><!-- end row -->
                            </div>
                        </div>
                        <!-- end row -->

        
                    </div> <!-- container-fluid -->    

</div> <!-- content -->
@endsection
@section('js')
    <script src="dist/js/selectField.js"></script>
@endsection
