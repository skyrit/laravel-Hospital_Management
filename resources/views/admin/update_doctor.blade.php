<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->

    <style type="text/css">
        label {
            display: inline-block;
            width: 200px;
        }

    </style>

    <base href="/public">
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
            <div class="container" align="center" style="padding-top: 100px">

                @if (session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert">X</button>
                        {{ session()->get('message') }}
                    </div>
                @endif

                <div align="left">
                    <form action="{{ url('editdoctor',$doctor->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div style="padding:15px">
                            <label>Doctor Name</label>
                            <input type="text" style="color: black;" name="name" value="{{$doctor->name}}"
                                required="">
                        </div>
                        <div style="padding:15px">
                            <label>Phone Number</label>
                            <input type="number" style="color: black;" name="number" value="{{$doctor->phone}}"
                                required="">
                        </div>
                        <div style="padding:15px">
                            <label>Speciality</label>
                            <select name="speciality" style="color: black; width:200px" required="">
                                <option>--Select--</option>
                                <option value="skin">Skin</option>
                                <option value="heart">Heart</option>
                                <option value="eye">Eye</option>
                                <option value="nose">Nose</option>
                            </select>
                        </div>
                        <div style="padding:15px">
                            <label>Room Number</label>
                            <input type="text" style="color: black;" name="room" value="{{$doctor->room}}">
                        </div>
                        <div style="padding:15px">
                            <label>Doctor Image</label>
                            <input type="file" name="file">
                        </div>
                        <div style="padding:15px">
                            <label>Old Image</label>
                            <img height="100px" width="100px" src="doctorimage/{{$doctor->image}}">
                        </div>
                        <div style="padding:15px">
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    <!-- End custom js for this page -->
</body>

</html>
