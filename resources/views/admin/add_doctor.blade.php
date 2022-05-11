
<!DOCTYPE html>
<html lang="en">
  <head>
    <style type="text/css">
        label{
            display: inline-block;
            width:200px;
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
      <div class="container-fluid page-body-wrapper">

    

          <div class="container" align="center" style="padding-top: 100px">

            @if (session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">
                    X
                </button>

                {{ session()->get('message') }}
            </div>
        @endif
                <form action="{{ url('upload_doctor') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div style="padding:15px;">
                        <label>Doctor Name</label>
                        <input type="text" style="color:black" name="name" placeholder="Write Doctor Name" required/>
                    </div>

                    <div style="padding:15px;">
                        <label>Phone</label>
                        <input type="number" style="color:black" name="name" placeholder="Write Doctor Phone" required/>
                    </div>

                    <div style="padding:15px;">
                        <label>Speciality</label>
                        <select style="color: black;width:200px" name="specialty" required>
                            <option value="Skin">Skin</option>
                            <option value="Heart">Heart</option>
                            <option value="Eye">Eye</option>
                            <option value="Orthopad">Orthopad</option>
                            

                        </select>
                    </div>
                    <div style="padding:15px;">
                        <label>Room number</label>
                        <input type="number" style="color:black" name="room" placeholder="Wrtie the room number" required/>
                    </div>
                    <div style="padding:15px;">
                        <label>Doctor Image</label>
                        <input type="file" name="file"/>
                    </div>
                    <div style="padding:15px;">

                        <input type="submit" class="btn btn-success"/>
                    </div>
                </form>
          </div>
      </div>
    </div>
    @include('admin.script')
  </body>
</html>
