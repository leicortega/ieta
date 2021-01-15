@extends('layouts.app')

@section('jsPlugin') <script src="{{ asset('assets//plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script> @endsection

@section('jsMain')
    <script src="{{ asset('assets/js/pages/global.js') }}"></script>
    <script src="{{ asset('assets/js/pages/estudiantes.js') }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Control de Estudiantes</h4>

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

                @if (session()->has('create'))
                    <div class="{{ session('create') == 0 ? 'alert alert-danger' : 'alert alert-success' }}">
                        <h6>{{ session('mensaje') }}</h6>
                    </div>
                @endif

                <div class="row p-xl-3 p-md-3">
                    <div class="table-responsive" id="Resultados">

                        <div class="page-title-box py-2">
                            <div class="row mx-0 align-items-center">

                                {{-- <div class="col-8">
                                    <h6>Fecha: {{ $hoy }} </h6>
                                </div> --}}
                                <div class="col-12">
                                    <div class="float-right">
                                        <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light float-right" data-toggle="modal" data-target="#modal_crear_estudiante" type="button">
                                            <i class="mdi mdi-plus mr-2"></i> Agregar
                                        </button>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <table class="table table-centered table-hover table-bordered mb-0 mt-0">
                            <thead>
                            <!--Fin parte de busqueda de datos-->
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col">Grado</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($estudiantes as $item)
                                    <tr>
                                        <th scope="row">
                                            <a href="#">{{ $item->identificacion }}</a>
                                        </th>
                                        <td>{{ $item->nombre }} {{ $item->apellido }}</td>
                                        <td>{{ $item->telefono }}</td>
                                        <td>{{ $item->correo }}</td>
                                        <td>Grado</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-outline-success btn-sm" onclick="asignarPermiso({{ $item->id }})" data-toggle="tooltip" data-placement="top" title="Asignar permiso">
                                                <i class="mdi mdi-check"></i>
                                            </button>

                                            <button type="button" class="btn btn-outline-info btn-sm" onclick="editarUsuario({{ $item->id }})" data-toggle="tooltip" data-placement="top" title="Editar">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{ $estudiantes->links() }}

            </div>
        </div>
    </div> <!-- end col -->
</div>

{{-- Modal Agregar --}}
<div class="modal fade bs-example-modal-lg" id="modal_crear_estudiante" tabindex="-1" role="dialog" aria-labelledby="modal-blade-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modal-blade-title">Agregar Estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-blade-body">
                <form action="/students/create" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="identificacion" class="col-sm-2 col-form-label">Identificación</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="identificacion" id="identificacion" placeholder="Escriba la identificacion" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Escriba el nombre" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="apellido" class="col-sm-2 col-form-label">Apellido</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="apellido" id="apellido" placeholder="Escriba el apellido" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="fecha_nacimiento" class="col-sm-2 col-form-label">Fecha Nacimiento</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="fecha_nacimiento" id="datepicker-autoclose" autocomplete="off" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="telefono" id="telefono" placeholder="Escriba el telefono"/>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="correo" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" name="correo" id="correo" placeholder="Escriba el correo"/>
                        </div>
                    </div>

                    <input type="hidden" name="estado" value="1">

                    <div class="mt-3">
                        <button class="btn btn-success btn-lg waves-effect waves-light" type="submit">Agregar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

{{-- Modal Registrar Ingreso --}}
<div class="modal fade bs-example-modal-lg" id="registrarIngreso" tabindex="-1" role="dialog" aria-labelledby="modal-blade-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="registrarIngreso-title"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-blade-body">
                <form action="/control/registrar" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="fecha" class="col-sm-2 col-form-label">Fecha</label>
                        <div class="col-sm-10">
                            {{-- <input class="form-control disabled" type="text" name="fecha" id="fecha" value="{{ $hoy }}" /> --}}
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="estado" class="col-sm-2 col-form-label">¿Como se siente?</label>
                        <div class="col-sm-10">
                            <select name="estado" id="estado" class="form-control" required>
                                <option value="Bien">Bien</option>
                                <option value="Mal">Mal</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="temperatura" class="col-sm-2 col-form-label">Temperatura</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" step="any" name="temperatura" id="temperatura" placeholder="Escriba la temperatura" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="contagiados" class="col-sm-2 col-form-label">¿Ha estado con contagiados?</label>
                        <div class="col-sm-10">
                            <select name="contagiados" id="contagiados" class="form-control" required>
                                <option value="No">No</option>
                                <option value="Si">Si</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" value="{{ Request::path() == 'control/funcionarios' ? 'Funcionario' : 'Cliente' }}" name="tipo" id="tipo" />

                    <input type="hidden" value="" name="control_ingreso_id" id="control_ingreso_id" />

                    <div class="mt-3">
                        <button class="btn btn-success btn-lg waves-effect waves-light" type="submit">Registrar</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
