@extends('layouts.app')

@section('css')
    <link href="{{ asset('assets/js/bootstrap-fileinput/css/fileinput.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('jsPlugin')
    <script src="{{ asset('assets/js/bootstrap-fileinput/js/fileinput.min.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('assets/js/bootstrap-fileinput/js/locales/es.js') }}" type="text/javascript" ></script>
    <script src="{{ asset('assets/js/bootstrap-fileinput/themes/fas/theme.min.js') }}" type="text/javascript" ></script>
@endsection

@section('jsMain')
    <script src="{{ asset('assets/js/main.js') }}" type="text/javascript" ></script>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Agregar Personal</h4>
                <hr>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                @if (isset($create) && $create = 1)
                    <div class="alert alert-success">
                        <h6>Personal registrado con exito. <b><a class="text-success" href="#" data-toggle="modal" data-target="#modal-blade">Clic aqui para imprimir el codigo QR</a></b></h6>
                    </div> 
                @endif

                @if (isset($create) && $create = 0)
                    <div class="alert alert-danger">
                        <h6>Personal NO registrado correctamente. </h6>
                    </div> 
                @endif

                <form action="{{ route('create-personal') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                
                    <div class="form-group row">
                        <label for="identificacion" class="col-sm-2 col-form-label">Identificacion</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="identificacion" id="identificacion" placeholder="Escriba la Identificacion" required autofocus />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="name" id="name" placeholder="Escriba el Nombre" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sede" class="col-sm-2 col-form-label">Sede</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="sede" id="sede" placeholder="Escriba la Sede" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="cargo" class="col-sm-2 col-form-label">Cargo</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="cargo" id="cargo" placeholder="Escriba el Cargo" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="estado" class="col-sm-2 col-form-label">Estado</label>
                        <div class="col-sm-10">
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="">Seleccione el estado</option>
                                <option value="activo">Activo</option>
                                <option value="inactivo">Inactivo</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" name="email" id="email" placeholder="Escriba el Correo" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="rh" class="col-sm-2 col-form-label">RH</label>
                        <div class="col-sm-10">
                            <select name="rh" id="rh" class="form-control" required>
                                <option value="">Seleccione el RH</option>
                                <option value="A+">A+</option>
                                <option value="B+">B+</option>
                                <option value="O+">O+</option>
                                <option value="AB+">AB+</option>
                                <option value="A-">A-</option>
                                <option value="B-">B-</option>
                                <option value="O-">O-</option>
                                <option value="AB-">AB-</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="foto" class="col-sm-2 col-form-label">Foto</label>
                        <div class="col-sm-10">
                            <input type="file" id="foto" name="foto" data-initial-preview="https://placehold.it/200x150/EFEFEF/AAAAAA&text=Foto+Personal" accept="image/*" />
                        </div>
                    </div>

                    <div class="mt-3">
                        <button class="btn btn-success btn-lg waves-effect waves-light" type="submit">Crear</button>
                    </div> 

                </form>

            </div>
        </div>
    </div> <!-- end col -->
</div>

{{-- Modal QR --}}
<div class="modal fade bs-example-modal-lg" id="modal-blade" tabindex="-1" role="dialog" aria-labelledby="modal-blade-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modal-blade-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center" id="modal-blade-body">
                @if (isset($qr))
                    <img src="{{ asset($qr) }}" class="img-fluid" alt="Foto">
                @endif
            </div>
        </div>
    </div>
</div>
@endsection