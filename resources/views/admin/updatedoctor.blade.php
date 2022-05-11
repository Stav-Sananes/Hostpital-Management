
<!DOCTYPE html>
<html lang="en">
  <head>
      <base href="/public">
      <style>
label{
    display:inline-block;
    width: 200px;
}

      </style>
    @include('admin.css')
  </head>
  <body>
    <div class="container-scroller">
 
      <!-- partial:partials/_sidebar.html -->
      @include('admin.sidebar')
      <!-- partial -->
    
      @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">

            
      <div class="container" align="center" style="padding:100px">
        @if (session()->has('message'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">
                X
            </button>

            {{ session()->get('message') }}
        </div>
    @endif
        <form action="{{ url('editdoctor',$data->id) }}" method="POST" enctype="multipart/form-data">
@csrf
                <div style="align items center">
                    <label>Doctor Name</label>
                    <input type="text" name="name" style="color:black" value="{{ $data->name }}">
                </div>
                <div>
                    <label>Doctor Phone</label>
                    <input type="text" name="phone" style="color:black" value="{{ $data->phone }}">
                </div>
                <div>
                    <label>Doctor Speciality</label>
                    <input type="text" name="specialty" style="color:black"value="{{ $data->specialty }}">
                </div>
                <div>
                    <label>Doctor Room</label>
                    <input type="text" name="room" style="color:black" value="{{ $data->room }}">
                </div>
                <div>
                    <label>Doctor image</label>
                    <img height="150" width="150" src="doctorimage/{{ $data->image }}">
                </div>

                <div style="padding:15px">
                   <label>Change image for doctor</label>
                        <input type="file" name="file">

                </div>
                
                <div style="padding:15px">
                         <input type="submit" class="btn btn-primary">
 
                 </div>
        </form>

      </div>

        </div>
          <!-- content-wrapper ends -->
          <!-- partial:partials/_footer.html -->

      <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
  </body>
</html>
