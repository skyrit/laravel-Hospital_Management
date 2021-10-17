<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
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
            <div align="center" style="padding-top: 100px">
                <table>
                    <tr style="background-color: black">
                        <th style="padding:10px">Doctor Name</th>
                        <th style="padding:10px">Phone Number</th>
                        <th style="padding:10px">Speciality</th>
                        <th style="padding:10px">Room Number</th>
                        <th style="padding:10px">Image</th>
                        <th style="padding:10px">Update</th>
                        <th style="padding:10px">Delete</th>
                    </tr>
                    @foreach ($doctor as $doctors)
                    <tr align="center" style="background-color: skyblue">
                        <td>{{$doctors->name}}</td>
                        <td>{{$doctors->phone}}</td>
                        <td>{{$doctors->speciality}}</td>
                        <td>{{$doctors->room}}</td>
                        <td><img height="100px" width="100px" src="doctorimage/{{$doctors->image}}"></td>
                        <td><a class="btn btn-primary" href="{{url('updatedoctor',$doctors->id)}}">Update</a></td>
                        <td><a onclick="return confirm('Are you sure to DELETE this?')" class="btn btn-danger" href="{{url('deletedoctor',$doctors->id)}}">Delete</a></td>
                    </tr>
                    @endforeach
                </table>
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
