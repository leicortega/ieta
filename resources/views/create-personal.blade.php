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
@endsection