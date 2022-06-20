@extends('layouts.app')

@section('content')
    <div class="content">

        <div class="container-fluid">
            <br>
            <br>
            <br>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            Subscription Status!
                        </div>
                        <div class="card-body">
                            <blockquote class="blockquote mb-0">
                                <h4>{{ Auth::user()->name }} welcome to our platform !</h4>
                                <footer class="blockquote-footer"><h5>
                                    Note: please contact your administrator for a plan renewal with to proceed to our application</h5></footer>
                            </blockquote>
                        </div>
                    </div>
                   
                </div>
            </div>

        </div> <!-- container-fluid -->


    </div> <!-- content -->
@endsection
@section('js')
    <script>
        function fetchMetaValues() {
            let metadata = document.getElementById('metadata');
            let units = document.getElementById('units').value;
            let fid = {
                'unit': units,
                'plan_type': '1'
            };
            metadata.value = JSON.stringify(fid);
        }

        function fetchMetaValues2() {
            let metadata = document.getElementById('metadata2');
            let units = document.getElementById('units2').value;
            let fid = {
                'unit': units,
                'plan_type': '2'
            };
            metadata.value = JSON.stringify(fid);
        }
        $('#units').on('input', function() {
            let data = $('#units').val();
            let cost = data * 300;

            $('#amount-text').html(`₦ ${cost}`);
            $('#amount').val(`${cost}00`);
        });

        $('#units2').on('input', function() {
            let data2 = $('#units2').val();
            let cost2 = data2 * 3480;

            $('#amount-text2').html(`₦ ${cost2}`);
            $('#amount2').val(`${cost2}00`);
        });
    </script>
@endsection
