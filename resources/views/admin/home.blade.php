
<!DOCTYPE html>
<html lang="en">
  <head>
      
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
 
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
    
      @include('admin.navbar')
        <!-- partial -->
      
        @include('admin.body')
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>
