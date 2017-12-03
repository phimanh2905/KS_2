<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Quản Lý Khách Sạn</title>

    <!-- Bootstrap Core CSS -->
    <link href=" {{ asset('backend/vendor/bootstrap/css/bootstrap.min.css')}} " rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href=" {{asset('backend/vendor/metisMenu/metisMenu.min.css')}} " rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="{{ asset('backend/vendor/datatables-plugins/dataTables.bootstrap.css')}}" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="{{ asset('backend/vendor/datatables-responsive/dataTables.responsive.css')}} " rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{ asset('backend/dist/css/sb-admin-2.css')}} " rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="{{ asset('backend/vendor/font-awesome/css/font-awesome.min.css')}} " rel="stylesheet" type="text/css">

</head>

<body>

    <div id="wrapper">

        @include('admin.header')
      

        @yield('content')
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="{{asset('backend/vendor/jquery/jquery.min.js')}}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{asset('backend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{asset('backend/vendor/metisMenu/metisMenu.min.js')}}"></script>

    <!-- DataTables JavaScript -->
    <script src="{{asset('backend/vendor/datatables/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('backend/vendor/datatables-plugins/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('backend/vendor/datatables-responsive/dataTables.responsive.js')}}"></script>

    <!-- Custom Theme JavaScript -->
    <script src="{{asset('backend/dist/js/sb-admin-2.js')}}"></script>
    @yield('script')
    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>
