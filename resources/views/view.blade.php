<!DOCTYPE html>
<html lang="es">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Dashboard Cootranshuila | Ver Personal</title>
        <meta content="Dashboard Cootranshuilaparala administracion del personal" name="description" />
        <meta content="Cootranshuila Dev Team" name="author" />
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/metismenu.min.css" rel="stylesheet" type="text/css">
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="assets/css/style.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <div class="account-page-full-height bg-success">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-xl-3 bg-white">
                        <div class="account-page-full-height">
                            <div class="p-3 mt-5">
                                <div>
                                    <div class="text-center py-4">
                                        <a href="/" class="logo"><img src="assets/images/logo-light.png" height="50" alt="logo"></a>
                                    </div>
                                    <div class="text-left p-3">
                                        <h4 class="font-18 text-center">Bienvenido</h4>
                                        <p class="text-muted text-center">Plataforma de información del personal.</p>
                
                                        <form class="form-horizontal mt-5" id="buscar-qr">
                                            @csrf
                
                                            <div class="form-group">
                                                <label for="identificacion">Identificación</label>
                                                <input type="text" class="form-control" id="identificacion" placeholder="Ingrese la identificación">
                                            </div>
                
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <button class="btn btn-success w-md waves-effect waves-light" type="submit">Buscar</button>
                                                </div>
                                            </div>
                                
                                        </form>
                                    </div>
                                    <div class="mt-5 text-center">
                                        <p>© 2020 Cootranshuila LTDA.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="text-white">
                            <div class="row">
                                
                                <div class="col-xl-12 text-center">
                                    <div class="text-center account-process p-4" id='content-qr'>
                                        <h5 class="mt-0 mb-5 d-inline-block p-3 bg-success rounded-circle border border-light position-relative">01</h5>
                                        <div class="mb-4">
                                            <i class="ti-user h1"></i>
                                        </div>
                                        <h5>Ingresa la Identificación</h5>
                                        <p class="text-white-50">Para ver el codigo QR de la información</p>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                </div>
                <!-- end row -->
            </div>
            <!-- end container-fluid -->
        </div>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/metismenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/waves.min.js"></script>

        <!-- App js -->
        <script src="assets/js/app.js"></script>
        <script src="assets/js/peticiones.js"></script>
        
    </body>

</html>