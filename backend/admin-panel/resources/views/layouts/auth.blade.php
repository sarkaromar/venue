<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ $title }} || Admin Panel<</title>
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{url('/')}}/public/assets/favicon.ico">
        <link rel="icon" href="{{url('/')}}/public/assets/favicon.ico" type="image/x-icon">
        
        <!-- vector map CSS -->
        <link href="{{url('/')}}/public/assets/vendors/bower_components/jasny-bootstrap/dist/css/jasny-bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/public/assets/dist/css/style.css" rel="stylesheet" type="text/css">
        <!-- Styles -->
        <link href="{{url('/')}}/public/assets/dist/css/style.css" rel="stylesheet" type="text/css">
        
    </head>
    <body>
        <div class="wrapper pa-0">
            <!-- Main Content -->
            <div class="page-wrapper pa-0 ma-0 auth-page">
                <div class="container-fluid">
                    <!-- Row -->
                    <div class="table-struct full-width full-height">
                        <div class="table-cell vertical-align-middle auth-form-wrap">
                            <div class="auth-form  ml-auto mr-auto no-float">
                                @yield('auth-content')
                            </div>
                        </div>
                    </div>
                    <!-- /Row -->	
                </div>
            </div>
            <!-- /Main Content -->
        </div>
        <!-- /#wrapper -->
        <!-- javascript -->
        <script src="{{url('/')}}/public/assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="{{url('/')}}/public/assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/public/assets/vendors/bower_components/jasny-bootstrap/dist/js/jasny-bootstrap.min.js"></script>
        <script src="{{url('/')}}/public/assets/dist/js/init.js"></script>
    </body>
</html>