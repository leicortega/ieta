@extends('layouts.app')

@section('jsPlugin') <script src="{{ asset('assets//plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script> @endsection

@section('jsMain')
    <script src="{{ asset('assets/js/pages/global.js') }}"></script>
    <script src="{{ asset('assets/js/pages/profesores.js') }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Areas</h4>

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
                                        <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light float-right" data-toggle="modal" data-target="#modal_crear_materias" type="button">
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
                                    <th scope="col">Año de vigencia</th>
                                    <th scope="col">Nombre del grado</th>
                                    <th scope="col">Director</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($materias as $key => $item)
                                    <tr>
                                        <th scope="row">
                                            <a href="#">{{ $key + 1 }}</a>
                                        </th>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ \App\Models\Profesor::find($item->id)->nombre }} {{ \App\Models\Profesor::find($item->id)->apellido }}</td>
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

                {{ $materias->links() }}

            </div>
        </div>
    </div> <!-- end col -->
</div>

{{-- Modal Agregar --}}
<div class="modal fade bs-example-modal-lg" id="modal_crear_materias" tabindex="-1" role="dialog" aria-labelledby="modal-blade-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modal-blade-title">Agregar Area</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-blade-body">
                <form action="/materias/create" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="year" class="col-sm-2 col-form-label">Año</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="year" id="year" readonly value="{{ \Carbon\Carbon::now()->format('Y') }}" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="nombre" class="col-sm-2 col-form-label">Nombre de la materia</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="nombre" id="nombre" placeholder="Escriba el nombre dela materia" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Grado</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="grados_id" class="grados_id">
                                <option>Seleccione el grado</option>
                                @foreach (\App\Models\Grado::all() as $grado)
                                    <option value="{{ $grado->id }}">{{ $grado->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Maestro</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="profesores_id" class="profesores_id">
                                <option>Seleccione el maestro</option>
                                @foreach (\App\Models\Profesor::all() as $profe)
                                    <option value="{{ $profe->id }}">{{ $profe->nombre }} {{ $profe->apellido }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

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
