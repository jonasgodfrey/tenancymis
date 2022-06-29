@extends('layouts.app')

@section('content')
    <div class="content">

        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                </div>
            </div>

            <!-- start page title -->

            <!-- end page title -->
            <br>
            <br>
            <div class="card">
                <div class="card-header">
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0 text-center">
                        <h3> <b style="text-transform: capitalize">Welcome Onboard {{ Auth::user()->name }}</b> !</h3>

                        <footer class="blockquote-footer">
                            <h4 class="text-center justify-center text-red-600">
                                please select a subscription plan you are
                                comfortable with to proceed to our application
                            </h4>
                        </footer>
                    </blockquote>
                    <br>
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
                                                <button
                                                    class="btn btn-bordered-success btn-success rounded-pill waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target="#basicPlanModal">
                                                    Pay Now
                                                </button>
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
                                                <button
                                                    class="btn btn-bordered-success btn-success rounded-pill waves-effect waves-light"
                                                    data-bs-toggle="modal" data-bs-target="#premiumPlanModal">
                                                    Pay Now
                                                </button>
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
                                            <br>
                                            <br>
                                            <ul class="plan-stats list-unstyled text-center p-3 mb-0">
                                                <li>Unlimited Properties</li>
                                                <li>Unlimited Managers</li>
                                                <li>Unlimited Tenants</li>
                                                <li>Unlimited Artisans</li>
                                                <li>Unlimited Notification/Reminders</li>
                                                <li>Training of Stakeholders</li>
                                            </ul>

                                            <div class="text-center">
                                                <a href="https://paystack.com"
                                                   class="btn btn-success btn-bordered-success rounded-pill waves-effect waves-light">Pay
                                                    Now</a>
                                            </div>
                                        </div>
                                    </div>
                                </article>


                            </div><!-- end row -->
                        </div>
                    </div>
                    <!-- end row -->
                </div>
            </div>
            <!-- Modal -->
            <div class="modal text-center  fade" id="basicPlanModal" tabindex="-1" aria-labelledby="basicPlanModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-secondary text-center">
                            <h5 class="modal-title text-white " id="basicPlanModalLabel">Basic Package Subscription</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal"
                              role="form">
                            <div class="modal-body">

                                <div class="row" style="margin-bottom:40px;">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Total Cost (N): </label>
                                        <h3 id="amount-text">0</h3>
                                    </div>

                                    <input type="hidden" name="amount" class="form-control" id="amount" value="30000">

                                    <div class="mb-3">
                                        <label for="units" class="form-label">Number Of Units: </label>
                                        <input type="number" name="units" class="form-control"
                                               placeholder="Enter Number of Units" id="units" value="" required>
                                    </div>

                                    <div class="col-md-8 col-md-offset-2">
                                        <input type="hidden" name="email"
                                               value="{{Auth::user()->email}}"> {{-- required --}}
                                        <input type="hidden" name="orderID" value="345">
                                        <input type="hidden" name="currency" value="NGN">
                                        <input type="hidden" name="metadata[]"
                                               value=""
                                               id="metadata"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                        <input type="hidden" name="reference"
                                               value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                        <input type="hidden" name="callback_url" class="form-control"
                                               value="{{route('handleGatewayCallback')}}">
                                        <input type="hidden" name="_token"
                                               value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-success" onmousedown="fetchMetaValues()" type="submit">
                                    Subscribe
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Modal -->
            <div class="modal text-center fade" id="premiumPlanModal" tabindex="-1"
                 aria-labelledby="premiumPlanModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-secondary">
                            <h5 class="modal-title text-white " id="premiumPlanModalLabel">Premium Package
                                Subscription</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal"
                              role="form">
                            <div class="modal-body">

                                <div class="row" style="margin-bottom:40px;">
                                    <div class="mb-3">
                                        <label for="amount" class="form-label">Total Cost (N): </label>
                                        <h3 id="amount-text2">0</h3>
                                    </div>

                                    <input type="hidden" name="amount" class="form-control" id="amount2" value="">

                                    <div class="mb-3">
                                        <label for="units" class="form-label">Number Of Units: </label>
                                        <input type="number" name="units" class="form-control"
                                               placeholder="Enter Number of Units" id="units2" value="" required>
                                    </div>

                                    <div class="col-md-8 col-md-offset-2">
                                        <input type="hidden" name="email"
                                               value="{{Auth::user()->email}}"> {{-- required --}}
                                        <input type="hidden" name="orderID" value="345">
                                        <input type="hidden" name="currency" value="NGN">
                                        <input type="hidden" name="metadata[]"
                                               value=""
                                               id="metadata2"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                        <input type="hidden" name="reference"
                                               value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                        <input type="hidden" name="callback_url" class="form-control"
                                               value="{{route('handleGatewayCallback')}}">
                                        <input type="hidden" name="_token"
                                               value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button class="btn btn-success" onmousedown="fetchMetaValues2()" type="submit">
                                    Subscribe
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div> <!-- container-fluid -->


    </div> <!-- content -->
@endsection
@section('js')
    <script>
        function fetchMetaValues() {
            let metadata = document.getElementById( 'metadata' )
            let units = document.getElementById( 'units' ).value
            let fid = { 'unit': units, 'plan_type': '1' }
            metadata.value = JSON.stringify( fid )
        }

        function fetchMetaValues2() {
            let metadata = document.getElementById( 'metadata2' )
            let units = document.getElementById( 'units2' ).value
            let fid = { 'unit': units, 'plan_type': '2' }
            metadata.value = JSON.stringify( fid )
        }

        $( '#units' ).on( 'input', function() {
            let data = $( '#units' ).val()
            let cost = data * 300

            $( '#amount-text' ).html( `₦ ${ cost }` )
            $( '#amount' ).val( `${ cost }00` )
        } )

        $( '#units2' ).on( 'input', function() {
            let data2 = $( '#units2' ).val()
            let cost2 = data2 * 3480

            $( '#amount-text2' ).html( `₦ ${ cost2 }` )
            $( '#amount2' ).val( `${ cost2 }00` )
        } )
    </script>
@endsection
