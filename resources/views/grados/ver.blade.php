@extends('layouts.app')

@section('css') <link href="{{ asset('assets/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" /> @endsection

@section('jsPlugin')
    <script src="{{ asset('assets/plugins/select2/js/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}"></script>
@endsection

@section('jsMain')
    <script src="{{ asset('assets/js/pages/global.js') }}"></script>
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <div class="d-flex">
                    <button class="btn btn-dark dropdown-toggle arrow-none waves-effect waves-light" type="button">
                        <i class="mdi mdi-arrow-left-bold mr-2"></i> Atras
                    </button>
                    <h1 class="ml-4 mt-2 header-title">Grado {{ $grado->nombre }}</h1>
                </div>

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

                                <div class="col-12">
                                    <div class="float-right">
                                        <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light float-right" data-toggle="modal" data-target="#modal_crear_grados" type="button">
                                            <i class="mdi mdi-pen mr-2"></i> Editar
                                        </button>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <table class="table table-centered table-hover table-bordered mb-0 mt-0">
                            <thead>
                            <!--Fin parte de busqueda de datos-->
                                <tr>
                                    <th scope="col">Año de vigencia</th>
                                    <th scope="col">Nombre del grado</th>
                                    <th scope="col">Director</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $grado->year }}</td>
                                    <td>{{ $grado->nombre }}</td>
                                    <td>{{ $grado->profesor->nombre }}</td>
                                </tr>
                                {{-- @foreach ($grados as $key => $item)
                                    <tr>
                                        <th scope="row">
                                            <a href="#">{{ $key + 1 }}</a>
                                        </th>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ \App\Models\Profesor::find($item->id)->nombre }} {{ \App\Models\Profesor::find($item->id)->apellido }}</td>
                                        <td class="text-center">
                                            <a href="/grados/{{ $item->id }}"><button type="button" class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ver grado">
                                                <i class="mdi mdi-eye"></i>
                                            </button></a>

                                            <button type="button" class="btn btn-outline-info btn-sm" onclick="editarUsuario({{ $item->id }})" data-toggle="tooltip" data-placement="top" title="Editar">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach --}}
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row p-xl-3 p-md-3">
                    <div class="table-responsive" id="Resultados">

                        <div class="page-title-box py-2">
                            <div class="row mx-0 align-items-center">

                                <div class="col-12 d-flex">
                                    <h5 class="col-6">Estudiantes del grado {{ $grado->nombre }}</h5>
                                    <div class="float-right col-6">
                                        <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light float-right" data-toggle="modal" data-target="#modal_agregar_estudiante" type="button">
                                            <i class="mdi mdi-plus mr-2"></i> Agregar Estudiantes
                                        </button>
                                    </div>
                                </div>
                            </div> <!-- end row -->
                        </div>

                        <table class="table table-centered table-hover table-bordered mb-0 mt-0">
                            <thead>
                            <!--Fin parte de busqueda de datos-->
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Identificacion</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Telefono</th>
                                    <th scope="col">Correo</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grado->detalle as $key => $item)
                                    <tr>
                                        <th scope="row">
                                            <a href="#">{{ $key + 1 }}</a>
                                        </th>
                                        <td>{{ $item->estudiante->identificacion }}</td>
                                        <td>{{ $item->estudiante->nombre }} {{ $item->estudiante->apellido }}</td>
                                        <td>{{ $item->estudiante->telefono }}</td>
                                        <td>{{ $item->estudiante->correo }}</td>
                                        <td class="text-center">
                                            <a href="/students/{{ $item->estudiante->id }}"><button type="button" class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ver Estudiante">
                                                <i class="mdi mdi-eye"></i>
                                            </button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="row p-xl-3 p-md-3">
                    <div class="table-responsive" id="Resultados">

                        <div class="page-title-box py-2">
                            <div class="row mx-0 align-items-center">
                                <h5 class="col-6">Areas del grado {{ $grado->nombre }}</h5>
                            </div> <!-- end row -->
                        </div>

                        <table class="table table-centered table-hover table-bordered mb-0 mt-0">
                            <thead>
                            <!--Fin parte de busqueda de datos-->
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Año de vigencia</th>
                                    <th scope="col">Docente</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($grado->materias as $key => $item)
                                    <tr>
                                        <th scope="row">
                                            <a href="#">{{ $key + 1 }}</a>
                                        </th>
                                        <td>{{ $item->nombre }}</td>
                                        <td>{{ $item->year }}</td>
                                        <td>{{ $item->profesor->nombre }}</td>
                                        <td class="text-center">
                                            <a href="/materias/{{ $item->id }}"><button type="button" class="btn btn-outline-success btn-sm" data-toggle="tooltip" data-placement="top" title="Ver Area">
                                                <i class="mdi mdi-eye"></i>
                                            </button></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                {{-- {{ $grados->links() }} --}}

            </div>
        </div>
    </div> <!-- end col -->
</div>

{{-- Modal Agregar --}}
<div class="modal fade bs-example-modal-lg" id="modal_agregar_estudiante" tabindex="-1" role="dialog" aria-labelledby="modal-blade-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color: #343a40 !important;">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modal-blade-title">Agregar estudiante</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-blade-body">
                <form action="/grados/agregar_estudiante" method="POST">
                    @csrf

                    <label class="control-label">Lista de estudiantes</label>

                    <select class="form-control select2" name="estudiantes_id">
                        <option>Seleccione el estudiante</option>
                        @foreach (\App\Models\Estudiante::all() as $estudiante)
                            <option value="{{ $estudiante->id }}">{{ $estudiante->identificacion }} - {{ $estudiante->nombre }} {{ $estudiante->apellido }}</option>
                        @endforeach
                    </select>

                    <input type="hidden" name="grados_id" id="grados_id" value="{{ $grado->id }}">

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
