@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Agregar Personal</h4>
                <hr>

                <form action="{{ route('create-personal') }}" method="POST">
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
                            <input type="file" class="form-control-file" id="foto" name="foto">
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