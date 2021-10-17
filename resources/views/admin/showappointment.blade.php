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
                        <th style="padding:10px">Customer Name</th>
                        <th style="padding:10px">Customer Email</th>
                        <th style="padding:10px">Customer Phone</th>
                        <th style="padding:10px">Doctor Name</th>
                        <th style="padding:10px">Data</th>
                        <th style="padding:10px">Message</th>
                        <th style="padding:10px">Status</th>
                        <th style="padding:10px">Approved</th>
                        <th style="padding:10px">Cancel</th>
                        <th style="padding:10px">Send Email</th>
                    </tr>
                    @foreach ($appointment as $appointments)
                        <tr align="center" style="background-color: skyblue;">
                            <td>{{ $appointments->name }}</td>
                            <td>{{ $appointments->email }}</td>
                            <td>{{ $appointments->phone }}</td>
                            <td>{{ $appointments->doctor }}</td>
                            <td>{{ $appointments->date }}</td>
                            <td>{{ $appointments->message }}</td>
                            <td>{{ $appointments->status }}</td>
                            <td><a class="btn btn-success" href="{{url('approved',$appointments->id)}}">Approved</a></td>
                            <td><a class="btn btn-danger" href="{{url('canceled',$appointments->id)}}">Cancel</a></td>
                            <td><a class="btn btn-primary" href="{{url('emailview',$appointments->id)}}">Send Mail</a></td>
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
