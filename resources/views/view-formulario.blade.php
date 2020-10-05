<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Dashboard Cootranshuila | Ver Personal</title>
        <meta content="Dashboard Cootranshuila administracion del personal" name="description" />
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
                                    
                                        <form class="form-horizontal mt-5"  method="GET" id="alex">
                                            @csrf
                                            <div class="form-group">
                                                <label for="identificacion">Identificación</label>
                                                <input type="text" class="form-control" id="identificacion_usuario" placeholder="Ingrese la identificación">
                                            </div>
                
                                            <div class="form-group row">
                                                <div class="col-12">
                                                    <button class="btn btn-success w-md waves-effect waves-light" type="submit">Buscar</button>
                                                </div>
                                            </div>
                                
                                        </form>
                                    
                                    </div>
                                    <div class="mt-5 text-center">
                                        <p>Cootranshuila © Copyright 2020, Todos los derechos reservados.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9">
                        <div class="text-white">
                            <div class="row">
                                
                                <div class="col-xl-12 text-center">
                                    <!--<div class="text-center account-process p-4" id='content-qr'>-->
                                    <div id="id_informacion">
                                        <h5 class="mt-0 mb-5 d-inline-block p-3 bg-success rounded-circle border border-light position-relative">01</h5>
                                        <div class="mb-4">
                                            <i class="ti-user h1"></i>
                                        </div>
                                            <h5>Ingresa la Identificación</h5>
                                            <p class="text-white-50">Para diligenciar el formulario</p>
                                        </div>
                                        <div id="id_formulario" class="container bg-dark p-5 rounded">
                                        <form method="POST" action="/insertar_registro">
                                            @csrf
                                            <div class="row">
                                                <div class="form-group col-3">
                                                    <input class="form-control" type="text" name="direccion" id="direccion" placeholder="Direccion"  required/>   
                                                </div>
                                                <div class="form-group col-3">
                                                    <input class="form-control" type="text" name="barrio" id="barrio" placeholder="Barrio"  required/> 
                                                </div>
                                                <div class="form-group col-3">
                                                    <select name="transporte" id="transporte" class="form-control" required>
                                                        <option value="vehiculo particular">vehiculo particular</option>
                                                        <option value="servicio publico">servicio publico</option>
                                                        <option value="bicicleta">bicicleta</option>
                                                        <option value="a pie">a pie</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-3">
                                                    <input class="form-control" type="text" name="tiempo" id="tiempo" placeholder="Tiempo de casa al trabajo"  required/>
                                                </div>
                                            </div>
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <label for="contagiados" class="col-sm-12 col-form-label text-center">MARQUE (SI O NO) SI PADECE ALGUNAS DE LAS SIGUIENTES CONDICIONES PREEXISTENTES</label>
                                                    </div>
                                                </div>
                                            <div class="row">
                                                <div class="form-group col-3">     
                                                    <select name="diabetes" id="diabetes" class="form-control" required>
                                                        <option >Diabetes</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>  
                                                </div>
                                                <div class="form-group col-3"> 
                                                    <select name="cardio_vascular" id="cardio_vascular" class="form-control" required>
                                                        <option >Enfermedad Cardio Vascular</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>  
                                                </div>
                                                <div class="form-group col-3">
                                                    <select name="pulmonar" id="pulmonar" class="form-control" required>
                                                        <option >Enfermedad Pulmonar</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-3">                      
                                                    <select name="obesidad" id="obesidad" class="form-control" required>
                                                        <option >Obesidad</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="form-group col-3">
                                                    <input class="form-control" type="number" name="personas_convive" id="personas_convive" placeholder="Con cuantas personas convive" required />
                                                </div>
                                                <div class="form-group col-3">
                                                    <input class="form-control" type="text" name="rango" id="rango" placeholder="Rango de edad de las personas"  required/>
                                                </div>
                                                <div class="form-group col-6">
                                                    <select name="campo_salud" id="campo_salud" class="form-control" required>
                                                        <option>¿Alguna de las personas con la que convive trabajan en el campo de la salud?</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-sm-12">
                                                    <label for="contagiados" class="col-sm-12 col-form-label text-center">MARQUE (SI O NO ) SI LAS PERSONAS CON LAS QUE VIVE PADECEN DE ALGUNA DE LAS SIGUIENTES CONDICIONES PREEXISTENTES</label>
                                                </div>
                                            </div> 
                                            <div class="row">
                                                <div class="form-group">
                                                    <div class="col-sm-12">
                                                        <select name="enfermedad_inmunosupresora" id="enfermedad_inmunosupresora" class="form-control" required>
                                                            <option >ENFERMEDADES INMUNOSUPRESORAS (Por ejemplo, quimioterapia, radioterapia, sida o Lupus)</option>
                                                            <option value="si">Si</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            
                                            <div class="row">
                                                <div class="form-group col-3">
                                                        <select name="hipertension" id="hipertension" class="form-control" required>
                                                            <option >HIPERTENSIÓN ARTERIAL HTA</option>
                                                            <option value="si">Si</option>
                                                            <option value="no">No</option>
                                                        </select>
                                                </div>
                                                <div class="form-group col-3">
                                                    <select name="enfermedad_pulmonar" id="enfermedad_pulmonar" class="form-control" required>
                                                        <option >ENFERMEDAD PULMONAR</option>
                                                        <option value="si">Si</option>
                                                        <option value="no">No</option>
                                                    </select>
                                                </div>
                                            </div> 
                                            <input type="hidden" name="personal_id" id="personal_id"/> 
                                            <div class="mt-3 text-center">
                                                <button class="btn btn-success btn-block waves-effect waves-light" type="submit">Registrar</button>
                                            </div>    
                                        </form> 
                                        </div>
                                        <div id="id_mensaje">
                                            <div class="alert alert-success">
                                                <strong>¡Ojo!</strong> Usted ya ha diligenciado este formulario.
                                            </div>
                                        </div>
                                        <div id="id_mensaje2">
                                            <div class="alert alert-success">
                                                <strong>¡Ojo!</strong> Debe llenar los campos.
                                            </div>
                                        </div> 
                                        <div id="id_mensaje3">
                                            <div class="alert alert-success">
                                                <strong>¡Ojo!</strong> El usuario no existe.
                                            </div>
                                        </div> 
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
    </body>

    <!-- jQuery  -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/metismenu.min.js"></script>
    <script src="assets/js/jquery.slimscroll.js"></script>
    <script src="assets/js/waves.min.js"></script>

    <!-- App js -->
    <script src="assets/js/app.js"></script>
    <script src="assets/js/peticiones.js"></script>

</html>