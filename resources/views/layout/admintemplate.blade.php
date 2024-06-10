<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title><?= $title ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- DataTables -->
    <link href="/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    <!-- Responsive datatable examples -->
    <link href="/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/assets/images/petshop.ico">


    <!-- Plugins css-->
    <link href="/plugins/bootstrap-tagsinput/css/bootstrap-tagsinput.css" rel="stylesheet" />
    <link href="/plugins/bootstrap-select/css/bootstrap-select.min.css" rel="stylesheet" />
    <link href="/plugins/select2/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link href="/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="/plugins/switchery/switchery.min.css">

    <!-- App css -->

    <link href="/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="/assets/css/style.css" rel="stylesheet" type="text/css" />

    <script src="/assets/js/modernizr.min.js"></script>

</head>


<body>
    <!-- Begin page -->
    <div id="wrapper">

        <!-- Top Bar Start -->
        <div class="topbar">

            <!-- LOGO -->
            <div class="topbar-left">
                <a href="/sipahe/AdminPages/home" class="logo">
                    <span>
                        <img src="/assets/images/petshop.png" alt="" height="50">
                    </span>
                    <i>
                        <img src="/assets/images/petshop.png" alt="" height="28">
                    </i>
                </a>
            </div>
            <nav class="navbar-custom">
                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-light waves-effect btn-lg">
                            <i class="mdi mdi-menu"></i>
                        </button>
                    </li>
                    <li class="float-right">

                        <a href="/sipahe/login/logout" type="button"
                            class="btn button-menu btn-custom btn-rounded w-md waves-effect waves-light btn-lg">Logout</a>

                    </li>
                </ul>
            </nav>

        </div>

        <!-- Top Bar End -->


        <!-- ========== Left Sidebar Start ========== -->
        <div class="left side-menu">
            <div class="slimscroll-menu" id="remove-scroll">

                <!--- Sidemenu -->
                <div id="sidebar-menu">
                    <!-- Left Menu Start -->
                    <ul class="metismenu" id="side-menu">
                        <li class="menu-title">SIPAGI</li>

                        <li><a href="/sipahe/admin/home"><i class="mdi mdi-view-dashboard"></i>
                                <span>Dashboard</span>
                            </a></li>
                        <li><a href="/sipahe/admin/penyakit"><i class="mdi mdi-tooth"></i> <span>Penyakit</span>
                            </a>
                        </li>
                        <li><a href="/sipahe/admin/gejala"><i class="mdi mdi-pulse"></i> <span>Gejala</span> </a>
                        </li>
                        <li><a href="/sipahe/admin/rulebase"><i class="mdi mdi-source-branch"></i> <span>Rule
                                    Base</span> </a></li>
                        <li><a href="/sipahe/admin/hasil"><i class=" mdi mdi-file-document-box"></i> <span>Hasil
                                    Diagnosis</span> </a></li>

                    </ul>

                </div>
                <!-- Sidebar -->
                <div class="clearfix"></div>

            </div>
            <!-- Sidebar -left -->

        </div>

        <!-- Left Sidebar End -->

        @yield('content')
        <footer class="footer text-right">
            © SiPahe. - Januar P
        </footer>
    </div>


    <!-- jQuery  -->
    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/js/popper.min.js"></script><!-- Popper for Bootstrap -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script src="/assets/js/metisMenu.min.js"></script>
    <script src="/assets/js/waves.js"></script>
    <script src="/assets/js/jquery.slimscroll.js"></script>

    <script src="/plugins/switchery/switchery.min.js"></script>
    <script src="/plugins/bootstrap-tagsinput/js/bootstrap-tagsinput.min.js"></script>
    <script src="/plugins/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="/plugins/bootstrap-select/js/bootstrap-select.js" type="text/javascript"></script>
    <script src="/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js" type="text/javascript"></script>
    <script src="/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js" type="text/javascript"></script>
    <script src="/plugins/bootstrap-maxlength/bootstrap-maxlength.min.js" type="text/javascript"></script>

    <script type="text/javascript" src="/plugins/autocomplete/jquery.mockjax.js"></script>
    <script type="text/javascript" src="/plugins/autocomplete/jquery.autocomplete.min.js"></script>
    <script type="text/javascript" src="/plugins/autocomplete/countries.js"></script>
    <script type="text/javascript" src="/assets/pages/jquery.autocomplete.init.js"></script>

    <!-- Init Js file -->
    <script type="text/javascript" src="/assets/pages/jquery.form-advanced.init.js"></script>

    <!-- Modal-Effect -->
    <script src="/plugins/custombox/js/custombox.min.js"></script>
    <script src="/plugins/custombox/js/legacy.min.js"></script>



    <!-- Parsley js -->
    <script type="text/javascript" src="/plugins/parsleyjs/parsley.min.js"></script>

    <!-- Required datatable js -->
    <script src="/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="/plugins/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Buttons examples -->
    <script src="/plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="/plugins/datatables/buttons.bootstrap4.min.js"></script>
    <script src="/plugins/datatables/jszip.min.js"></script>
    <script src="/plugins/datatables/pdfmake.min.js"></script>
    <script src="/plugins/datatables/vfs_fonts.js"></script>
    <script src="/plugins/datatables/buttons.html5.min.js"></script>
    <script src="/plugins/datatables/buttons.print.min.js"></script>
    <script src="/plugins/datatables/buttons.colVis.min.js"></script>

    <!-- Responsive examples -->
    <script src="/plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="/plugins/datatables/responsive.bootstrap4.min.js"></script>

    <!-- App js -->
    <script src="/assets/js/jquery.core.js"></script>
    <script src="/assets/js/jquery.app.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable();

            //Buttons examples
            var table = $('#datatable-buttons').DataTable({
                lengthChange: false,
                buttons: ['copy', 'excel', 'pdf', 'colvis']
            });

            table.buttons().container()
                .appendTo('#datatable-buttons_wrapper .col-md-6:eq(0)');
        });
    </script>



    <script type="text/javascript">
        $(document).ready(function() {
            $('form').parsley();
        });
    </script>

</body>

</html>
