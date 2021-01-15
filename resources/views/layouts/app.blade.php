<!DOCTYPE html>
<html lang="es">

    @include('layouts.src.head')

    <body>

        <!-- Begin page -->
        <div id="wrapper">

            <!-- Top Bar Start -->
            @include('layouts.topbar')
            <!-- Top Bar End -->

            <!-- ========== Left Sidebar Start ========== -->
            @include('layouts.side-menu')
            <!-- Left Sidebar End -->

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
            <div class="content-page">
                <!-- Start content -->
                <div class="content mx-lg-4 mx-sm-0">
                    <div class="container-fluid">
                        <div class="page-title-box">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">Dashboard IETA</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item active">
                                            @auth
                                                User: {{ auth()->user()->name }}
                                            @endauth
                                        </li>
                                    </ol>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->


                    </div>
                    <!-- container-fluid -->

                    @yield('content')

                </div>
                <!-- content -->

                <footer class="footer">
                    Institución Educativa Tecnico Agricola © Copyright 2021, Todos los derechos reservados.
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->

        </div>
        <!-- END wrapper -->

        @include('layouts.src.footer')

    </body>

</html>
