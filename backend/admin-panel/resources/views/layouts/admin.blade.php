<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        
        <title>{{$title}}</title>
        
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <!-- Favicon -->
        <link rel="shortcut icon" href="{{url('/')}}/public/assets/favicon.ico">
        <link rel="icon" href="{{url('/')}}/public/assets/favicon.ico" type="image/x-icon">
        
        <!-- Morris Charts CSS -->
        <link href="{{url('/')}}/public/assets/vendors/bower_components/morris.js/morris.css" rel="stylesheet" type="text/css"/>
        
        <!-- Data table CSS -->
        <link href="{{url('/')}}/public/assets/vendors/bower_components/datatables/media/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
        <link href="{{url('/')}}/public/assets/vendors/bower_components/datatables.net-responsive/css/responsive.dataTables.min.css" rel="stylesheet" type="text/css"/>
        
        <!-- Bootstrap table CSS -->
        <link href="{{url('/')}}/public/assets/vendors/bower_components/bootstrap-table/dist/bootstrap-table.css" rel="stylesheet" type="text/css"/>

        <!-- unknown -->
        <link href="{{url('/')}}/public/assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.css" rel="stylesheet" type="text/css">
        
        <!-- Styles -->
        <link href="{{url('/')}}/public/assets/dist/css/style.css" rel="stylesheet" type="text/css">
        
        <script>
            function check() {
                var chk = confirm("Are you sure want to do this?");
                if (chk) {
                    return true;
                } else {
                    return false;
                }
            }
        </script>
    
    </head>
    <body>
        <div class="wrapper theme-1-active pimary-color-green">
            <!-- Top Menu Items -->
            <nav class="navbar navbar-inverse navbar-fixed-top">
                <div class="mobile-only-brand pull-left">
                    <div class="nav-header pull-left">
                        <div class="logo-wrap">
                            <a href="{{ url('/') }}">
                                <img class="brand-img" src="{{url('/')}}/public/assets/dist/img/logo.png" alt="brand"/>
                                <span class="brand-text">{{$title}}</span>
                            </a>
                        </div>
                    </div>	
                    <a id="toggle_nav_btn" class="toggle-left-nav-btn inline-block ml-20 pull-left" href="javascript:void(0);"><i class="zmdi zmdi-menu"></i></a>
                    <a id="toggle_mobile_search" data-toggle="collapse" data-target="#search_form" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-search"></i></a>
                    <a id="toggle_mobile_nav" class="mobile-only-view" href="javascript:void(0);"><i class="zmdi zmdi-more"></i></a>
                    <form id="search_form" role="search" class="top-nav-search collapse pull-left">
                        <div class="input-group">
                            <input type="text" name="example-input1-group2" class="form-control" placeholder="Search">
                            <span class="input-group-btn">
                                <button type="button" class="btn  btn-default"  data-target="#search_form" data-toggle="collapse" aria-label="Close" aria-expanded="true"><i class="zmdi zmdi-search"></i></button>
                            </span>
                        </div>
                    </form>
                </div>
                
                <div id="mobile_only_nav" class="mobile-only-nav pull-right">
                    <ul class="nav navbar-right top-nav pull-right">
                        <!--some functionality here-->
                        <!--user info-->
                        <li class="dropdown auth-drp">
                            <a href="#" class="dropdown-toggle pr-0" data-toggle="dropdown"><img src="{{url('/')}}/public/assets/dist/img/user1.png" alt="" class="user-auth-img img-circle"/><span class="user-online-status"></span></a>
                            <ul class="dropdown-menu user-auth-dropdown" data-dropdown-in="flipInX" data-dropdown-out="flipOutX">
                                <li>
                                    <a href="profile.html"><i class="zmdi zmdi-account"></i><span>Profile</span></a>
                                </li>
                                <li>
                                    <a href="{{url('/logout')}}"><i class="zmdi zmdi-power"></i><span>Log Out</span></a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>	
            </nav>
            <!-- /Top Menu Items -->
            <!-- Left Sidebar Menu -->
            <div class="fixed-sidebar-left">
                <ul class="nav navbar-nav side-nav nicescroll-bar">
                    <li class="navigation-header">
                        <span>Section</span> 
                        <i class="zmdi zmdi-more"></i>
                    </li>
                    <!--dashboard-->
                    <li>
                        <a href="{{url('/dashboard')}}"><div class="pull-left"><i class="fa fa-dashboard mr-20"></i><span class="right-nav-text">Dashboard</span></div><div class="clearfix"></div></a>
                    </li>
                    <!--admin user-->
                    <li>
                        <a href="{{url('/user')}}"><div class="pull-left"><i class="fa fa-fw fa-users mr-20"></i><span class="right-nav-text">User</span></div><div class="clearfix"></div></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv1"><div class="pull-left"><i class="zmdi zmdi-filter-list mr-20"></i><span class="right-nav-text">multilevel</span></div><div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                        <ul id="dropdown_dr_lv1" class="collapse collapse-level-1">
                            <li>
                                <a href="#">Item level 1</a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#dropdown_dr_lv2">Dropdown level 2<div class="pull-right"><i class="zmdi zmdi-caret-down"></i></div><div class="clearfix"></div></a>
                                <ul id="dropdown_dr_lv2" class="collapse collapse-level-2">
                                    <li>
                                        <a href="#">Item level 2</a>
                                    </li>
                                    <li>
                                        <a href="#">Item level 2</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /Left Sidebar Menu -->
            <!-- Main Content -->
            <div class="page-wrapper">
                <div class="container-fluid">
                    
                    <!-- content -->
                    @yield('admin-content')
                    <!-- /content -->
                    
                    <!-- Footer -->
                    <footer class="footer container-fluid pl-30 pr-30">
                        <div class="row">
                            <div class="col-sm-12">
                                <p><?=date('Y');?> &copy; project_name. Pampered by company_name</p>
                            </div>
                        </div>
                    </footer>
                    <!-- /Footer -->
                </div>
            </div>
            <!-- /Main Content -->
        </div>
        <!-- /#wrapper -->
        
        <!-- javascript -->
        <script src="{{url('/')}}/public/assets/vendors/bower_components/jquery/dist/jquery.min.js"></script>
        <script src="{{url('/')}}/public/assets/vendors/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="{{url('/')}}/public/assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="{{url('/')}}/public/assets/dist/js/dataTables-data.js"></script>
        
        <!-- Bootstrap-table JavaScript -->
        <script src="{{url('/')}}/public/assets/vendors/bower_components/bootstrap-table/dist/bootstrap-table.min.js"></script>
        <script src="{{url('/')}}/public/assets/dist/js/bootstrap-table-data.js"></script>
        
        
         <!-- Data table JavaScript -->
        <script src="{{url('/')}}/public/assets/vendors/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="{{url('/')}}/public/assets/vendors/bower_components/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
        <script src="{{url('/')}}/public/assets/vendors/bower_components/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
        <script src="{{url('/')}}/public/assets/dist/js/responsive-datatable-data.js"></script>
        
        <!-- Slimscroll JavaScript -->
	<script src="{{url('/')}}/public/assets/dist/js/jquery.slimscroll.js"></script>
        
        <!-- simpleWeather JavaScript -->
	<script src="{{url('/')}}/public/assets/vendors/bower_components/moment/min/moment.min.js"></script>
	<script src="{{url('/')}}/public/assets/vendors/bower_components/simpleWeather/jquery.simpleWeather.min.js"></script>
	<script src="{{url('/')}}/public/assets/dist/js/simpleweather-data.js"></script>
        
        <!-- Progressbar Animation JavaScript -->
	<script src="{{url('/')}}/public/assets/vendors/bower_components/waypoints/lib/jquery.waypoints.min.js"></script>
	<script src="{{url('/')}}/public/assets/vendors/bower_components/jquery.counterup/jquery.counterup.min.js"></script>
        
        <script src="{{url('/')}}/public/assets/dist/js/jquery.slimscroll.js"></script>
        <script src="{{url('/')}}/public/assets/vendors/bower_components/owl.carousel/dist/owl.carousel.min.js"></script>
        
        <!-- Fancy Dropdown JS -->
	<script src="{{url('/')}}/public/assets/dist/js/dropdown-bootstrap-extended.js"></script>
	
	<!-- Sparkline JavaScript -->
	<script src="{{url('/')}}/public/assets/vendors/jquery.sparkline/dist/jquery.sparkline.min.js"></script>
	
	<!-- ChartJS JavaScript -->
	<script src="{{url('/')}}/public/assets/vendors/chart.js/Chart.min.js"></script>
	
	<!-- Morris Charts JavaScript -->
        <script src="{{url('/')}}/public/assets/vendors/bower_components/raphael/raphael.min.js"></script>
        <script src="{{url('/')}}/public/assets/vendors/bower_components/morris.js/morris.min.js"></script>
        <script src="{{url('/')}}/public/assets/vendors/bower_components/jquery-toast-plugin/dist/jquery.toast.min.js"></script>
        
        <!-- Switchery JavaScript -->
        <script src="{{url('/')}}/public/assets/vendors/bower_components/switchery/dist/switchery.min.js"></script>
        
        <!-- Fancy Dropdown JS -->
        <script src="{{url('/')}}/public/assets/dist/js/dropdown-bootstrap-extended.js"></script>
        
        <!-- Init JavaScript -->
        <script src="{{url('/')}}/public/assets/dist/js/init.js"></script>
        <script src="{{url('/')}}/public/assets/dist/js/dashboard-data.js"></script>

    </body>
</html>   