 <!-- footer -->
 <!-- ============================================================== -->
 <!-- Flash Messages  -->
 <!-- ============================================================== -->
 <div class="row">
     <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
         @if ($errors->any())
             <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                 @foreach ($errors->all() as $error)
                     <p>{{ $error }}</p>
                 @endforeach
             </div>
         @endif

         @if (Session::has('flash_message'))
             <div class="alert alert-success alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                 {{ Session::get('flash_message') }}
             </div>
         @endif
         @if (Session::has('error_message'))
             <div class="alert alert-danger alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                 {{ Session::get('error_message') }}
             </div>
         @endif
         @if (Session::has('warn_message'))
             <div class="alert alert-warning alert-dismissible">
                 <button type="button" class="close" data-dismiss="alert">&times;</button>
                 {{ Session::get('warn_message') }}
             </div>
         @endif
     </div>
 </div>

