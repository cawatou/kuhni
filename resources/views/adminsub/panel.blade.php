<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="" />
    <link rel="shortcut icon" href="javascript:;" type="image/png">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{asset('assets/css/jquery.easy-pie-chart.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-jvectormap-1.1.1.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/slidebars.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/switchery.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery-ui-1.10.1.custom.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/datetimepicker.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fileinput.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.nestable.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/toastr.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style-responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/customwnd.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/selectize.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/select2.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/select2-bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.tableTools.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.colVis.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.responsive.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.scroller.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <script type="text/javascript" src="{{ asset('assets/js/jquery-1.10.2.min.js') }}"></script>
</head>
<!--?php if(isset($global_settings)) : ?> sidebar-collapsed<!--?php endif; ?-->
<body class="sticky-header">

    <section>
        <!-- sidebar left start-->
        <div id="leftMenu" class="sidebar-left">
            <!--responsive view logo start-->
            <div class="logo dark-logo-bg visible-xs-* visible-sm-*">
                <a href="/administrator">
                    CMS
                </a>
            </div>
            <!--responsive view logo end-->

            <div class="sidebar-left-info">
                
                <ul class="nav nav-pills nav-stacked side-navigation">
                    <li>
                        <a href="/administrator"><i class="fa fa-list"> </i> <span>Главная</span></a>
                    </li>
                </ul>
                <!--sidebar nav end-->
                
                
            </div>
        </div>
        <!-- sidebar left end-->

        <!-- body content start-->
        <div class="body-content mainContent" >

            <!-- header section start-->
            <div class="header-section">

                <!--logo and logo icon start-->
                <div class="logo dark-logo-bg hidden-xs hidden-sm">
                    <a href="/administrator">
                        CMS
                    </a>
                </div>

                <div class="icon-logo dark-logo-bg hidden-xs hidden-sm">
                    <a href="/administrator">
                        CMS
                    </a>
                </div>
                <!--logo and logo icon end-->

                <!--toggle button start-->
                <a class="toggle-btn"><i class="fa fa-outdent"></i></a>
                <!--toggle button end-->
                <div class="notification-wrap">
                <!--right notification start-->
                <div class="right-notification">
                    <ul class="notification-menu">
                        <li>
                            <a href="javascript:;" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                                <img src="{{asset('assets/img/avatar-mini.jpg')}}" alt="">User
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu purple pull-right">
                                <li><a href="/auth/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                            </ul>
                        </li>

                    </ul>
                </div>
                <!--right notification end-->
                </div>

            </div>
            <!-- header section end-->

            <!--body wrapper start-->
            <div class="wrapper">
                @yield('content')
            </div>
            <!--body wrapper end-->


            <!--footer section start-->
            <footer>
                {{--2015 &copy; SlickLab by VectorLab.--}}
            </footer>
            <!--footer section end-->

        </div>
        <!-- body content end-->
    </section>
    
    <div class="modal fade" id="ModalSetConfirm" tabindex="-1" role="dialog" aria-labelledby="ModalSetConfirmLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title confirm-title">Modal Tittle</h4>
                </div>
                <div class="modal-body confirm-message"></div>
                <div class="modal-footer">
                    <button class="btn btn-success confirm-yes" type="button">Continue</button>
                    <button class="btn btn-default confirm-no" type="button">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    
    <script type="text/javascript" src="{{ asset('assets/js/jquery-ui-1.10.1.custom.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery-migrate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/modernizr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.nicescroll.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/slidebars.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/switchery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/switchery-init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.flot.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/flot-spline.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.flot.resize.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.flot.tooltip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.flot.pie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.flot.selection.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.flot.stack.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.flot.crosshair.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/earning-chart-init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.sparkline.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/sparkline-init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.easy-pie-chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/easy-pie-chart.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datetimepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-timepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-datepicker.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/picker-init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/icheck.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/todo-init.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.countTo.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/fileinput.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/tinymce/tinymce.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/tinymce/jquery.tinymce.min.js') }}"></script>
    <script src="{{ asset('assets/js/Sortable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.nestable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/toastr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/select2.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.dataTables.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.tableTools.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/bootstrap-dataTable.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.colVis.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.responsive.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/dataTables.scroller.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/customwnd.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/jquery.form.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
