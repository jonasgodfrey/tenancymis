 <!-- footer -->
 <!-- ============================================================== -->
 <!-- Flash Messages  -->
 <!-- ============================================================== -->
 <div class="row">
     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         @if ($errors->any())
         <div class="alert alert-danger alert-dismissible fade show" data-bs-dismiss="alert" role="alert">
             @foreach ($errors->all() as $error)
             <p>{{ $error }}</p>
             @endforeach
         </div>
         @endif

         @if (Session::has('flash_message'))
         <div class="alert alert-success fade show" role="alert">
             {{ Session::get('flash_message') }}

         </div>
         @endif
         @if (Session::has('error_message'))
         <div class="alert alert-danger fade show" role="alert">
             {{ Session::get('error_message') }}

         </div>
         @endif
         @if (Session::has('warn_message'))
         <div class="alert alert-warning fade show" role="alert">
             {{ Session::get('warn_message') }}

         </div>
         @endif
     </div>
 </div>