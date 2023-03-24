<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>phonebook.ir - @yield('title')</title>
    <!-- Custom styles for this template-->
    <link href="{{asset('/css/bootstrap.css')}}" rel="stylesheet">
    @yield('styles')
</head>
<body id="page-top">
<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">
        <!-- Main Content -->
        <div id="content">
            <div class="container-fluid">
                @yield('content')
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- End of Main Content -->
        <!-- Footer -->
        @include('home.sections.footer')
        <!-- End of Footer -->
    </div>
    <!-- End of Content Wrapper -->
</div>
<!-- End of Page Wrapper -->
<script src="{{asset('/js/bootstrap.min.js')}}"></script>
<script src="{{asset('/js/jquery-1.11.3.min.js')}}"></script>
@yield('scripts')
</body>
</html>
