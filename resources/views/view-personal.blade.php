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

        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
    </head>

    <body class="bg-success">

        <div class="account-pages my-5 pt-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-pattern shadow-none">
                            <div class="card-body">
                                <div class="text-center mt-4">
                                    <div class="mb-3">
                                        <a href="index.html" class="logo"><img src="{{ asset('assets/images/logo-light.png') }}" height="50" alt="logo"></a>
                                    </div>
                                </div>
                                <div class="p-3"> 
                                    <h4 class="font-18 text-center">Información</h4>
                                    <p class="text-muted text-center">La siguente información corresponde a {{ $personal->name }}</p>

                                    <form class="form-horizontal" action="index.html">
                
                                        <div class="user-thumb text-center mb-4">
                                            <img src="{{ asset('assets/images/personal/'.$personal->foto) }}" class="rounded-circle img-thumbnail thumb-lg" alt="Foto">
                                            <h6 class="mt-3">{{ $personal->name }}</h6>
                                        </div>

                                        <hr>

                                        <div class="user-thumb text-center mb-4">
                                            <h6 class="mt-3">Identificacion: {{ $personal->identificacion }}</h6>
                                        </div>
                                        <div class="user-thumb text-center mb-4">
                                            <h6 class="mt-3">Sede: {{ $personal->sede }}</h6>
                                        </div>
                                        <div class="user-thumb text-center mb-4">
                                            <h6 class="mt-3">Cargo: {{ $personal->cargo }}</h6>
                                        </div>
                                        <div class="user-thumb text-center mb-4">
                                            <h6 class="mt-3">Estado: {{ $personal->estado }}</h6>
                                        </div>

                    
            
                                        
            
                                        <div class="form-group row">
                                            <div class="col-12 text-center">
                                                <a href="/" class="btn btn-success w-md waves-effect waves-light" >Volver</a>
                                            </div>
                                        </div>
    
                                    </form>
                
                                </div>
                    
                            </div>
                        </div>
                        <div class="mt-5 text-center text-white-50">
                            <p>© 2020 Cootranshuila LTDA.</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <!-- jQuery  -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('assets/js/metismenu.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/waves.min.js') }}"></script>

        <!-- App js -->
        <script src="{{ asset('assets/js/app.js') }}"></script>
        
    </body>

</html>