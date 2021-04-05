<!DOCTYPE html>
<html lang="en">
    <meta http-equiv="content-type" content="text/html;charset=utf-8" />
    <head>
        <meta charset="utf-8" />
        <link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png" />
        <link rel="icon" type="image/png" href="assets/img/favicon.png" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Appointment Dashboard</title>
        <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />
        <!-- Canonical SEO -->
        <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard-pro" />
        <!--  Social tags      -->
        <meta
            name="keywords"
            content="mithu, developermithu, appointment"
        />
        <meta name="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design." />
        <!-- Schema.org markup for Google+ -->
        <meta itemprop="name" content="Material Dashboard PRO by Creative Tim" />
        <meta itemprop="description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design." />
        <meta itemprop="image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg" />
        <!-- Twitter Card data -->
        <meta name="twitter:card" content="product" />
        <meta name="twitter:site" content="@creativetim" />
        <meta name="twitter:title" content="Material Dashboard PRO by Creative Tim" />
        <meta name="twitter:description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design." />
        <meta name="twitter:creator" content="@creativetim" />
        <meta name="twitter:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg" />
        <!-- Open Graph data -->
        <meta property="fb:app_id" content="655968634437471" />
        <meta property="og:title" content="Material Dashboard PRO by Creative Tim" />
        <meta property="og:type" content="article" />
        <meta property="og:url" content="dashboard.html" />
        <meta property="og:image" content="../../../s3.amazonaws.com/creativetim_bucket/products/51/original/opt_mdp_thumbnail.jpg" />
        <meta property="og:description" content="Material Dashboard PRO is a Premium Material Bootstrap 4 Admin with a fresh, new design inspired by Google's Material Design." />
        <meta property="og:site_name" content="Creative Tim" />

        <!--     Fonts and icons     -->
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
        <link rel="stylesheet" href="" />
        <!-- Fontawesome CDN -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
        <!-- Toastr CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css"/>
        <!-- CSS Files -->
        <link href="{{asset('backend/assets/css/material-dashboard.min6c54.css?v=2.2.2')}}" rel="stylesheet" />
        @livewireStyles
    </head>

    <body class="">
        <div class="wrapper">

            <!-- Sidebar -->
           @include('layouts.backend.sidebar')
            <!-- End Sidebar -->

            <div class="main-panel">

                <!-- Navbar -->
               @include('layouts.backend.navbar')
                <!-- End Navbar -->

                <div class="content">
                    <div class="content">
                        <div class="container-fluid">

                             <!--  Main Content -->
                             {{-- @yield('content') --}}
                             {{ $slot }}
                            <!-- End Main Content -->

                        </div>
                    </div>
                </div>

                 <!-- Footer -->
                <footer class="footer">
                    <div class="container-fluid">
                        <nav class="float-left">
                            <ul>
                                <li>
                                    <a href="https://www.creative-tim.com/"> Creative Tim </a>
                                </li>
                            </ul>
                        </nav>
                        <div class="copyright float-right">
                            &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script>
                            , Developed By
                            <a href="https://www.creative-tim.com/" target="_blank">Mithu</a>
                        </div>
                    </div>
                </footer>
                <!-- End Footer -->
        
            </div>
        </div>

        <!--   Core JS Files   -->
        <script src="{{asset('backend/assets/js/core/jquery.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/core/popper.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/core/bootstrap-material-design.min.js')}}"></script>
        <script src="{{asset('backend/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
        <!-- Plugin for the momentJs  -->
        <script src="{{asset('backend/assets/js/plugins/moment.min.js')}}"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="{{asset('backend/assets/js/plugins/sweetalert2.js')}}"></script>
        <!-- Forms Validations Plugin -->
        <script src="{{asset('backend/assets/js/plugins/jquery.validate.min.js')}}"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="{{asset('backend/assets/js/plugins/jquery.bootstrap-wizard.js')}}"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{asset('backend/assets/js/plugins/bootstrap-selectpicker.js')}}"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{asset('backend/assets/js/plugins/bootstrap-datetimepicker.min.js')}}"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="{{asset('backend/assets/js/plugins/jquery.dataTables.min.js')}}"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{asset('backend/assets/js/plugins/bootstrap-tagsinput.js')}}"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="{{asset('backend/assets/js/plugins/jasny-bootstrap.min.js')}}"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="{{asset('backend/assets/js/plugins/fullcalendar.min.js')}}"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="{{asset('backend/assets/js/plugins/jquery-jvectormap.js')}}"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{asset('backend/assets/js/plugins/nouislider.min.js')}}"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js')}}"></script>
        <!-- Library for adding dinamically elements -->
        <script src="{{asset('backend/assets/js/plugins/arrive.min.js')}}"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB2Yno10-YTnLjjn_Vtk0V8cdcY5lC4plU"></script>
        <!-- Place this tag in your head or just before your close body tag. -->
        <script async defer src="buttons.github.io/buttons.js"></script>
        <!-- Chartist JS -->
        <script src="{{asset('backend/assets/js/plugins/chartist.min.js')}}"></script>
        <!--  Notifications Plugin    -->
        <script src="{{asset('backend/assets/js/plugins/bootstrap-notify.js')}}"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
        <script src="{{asset('backend/assets/js/material-dashboard.min6c54.js?v=2.2.2" type="text/javascript')}}"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script>
            $(document).ready(function () {
                $("#datatables").DataTable({
                    pagingType: "full_numbers",
                    lengthMenu: [
                        [10, 25, 50, -1],
                        [10, 25, 50, "All"],
                    ],
                    responsive: true,
                    language: {
                        search: "INPUT",
                        searchPlaceholder: "Search records",
                    },
                });

                var table = $("#datatables").DataTable();

                // Edit record

                table.on("click", ".edit", function () {
                    $tr = $(this).closest("tr");

                    if ($($tr).hasClass("child")) {
                        $tr = $tr.prev(".parent");
                    }

                    var data = table.row($tr).data();
                    alert("You press on Row: " + data[0] + " " + data[1] + " " + data[2] + "'s row.");
                });
                // Delete a record
                table.on("click", ".remove", function (e) {
                    $tr = $(this).closest("tr");

                    if ($($tr).hasClass("child")) {
                        $tr = $tr.prev(".parent");
                    }

                    table.row($tr).remove().draw();
                    e.preventDefault();
                });

                //Like record

                table.on("click", ".like", function () {
                    alert("You clicked on Like button");
                });
            });
        </script>

{{-- My Custom JS --}}
        <script>
           $(document).ready(function() {
            toastr.options = {
            "progressBar": true,
            "positionClass": "toast-bottom-right",
            }
            window.addEventListener('hide-form', e => {
                $('#form').modal('hide');
                toastr.success(e.detail.message);
            })
           });
        </script>
        <script>
            // dispatchBrowserEvent
            window.addEventListener('show-form', event => {
                $('#form').modal('show');
            })
            window.addEventListener('hide-form', e => {
                $('#form').modal('hide');
            })
            window.addEventListener('show-delete-modal', e => {
                $('#confirmationModal').modal('show');
            })
            window.addEventListener('hide-delete-modal', e => {
                $('#confirmationModal').modal('hide');
                toastr.success(e.detail.message);
            })
        </script>

@livewireScripts
    </body>
</html>
