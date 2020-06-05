@extends('layouts.app')

@section('jsMain') 
    <script src="{{ asset('assets/js/peticiones.js') }}"></script> 
    @if (isset($_GET['create']) && $_GET['create'] == 1)
        <script>registrarIngreso('<?php echo $_GET["id"] ?>', '<?php echo $_GET["name"] ?>')</script>
    @endif
@endsection

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Control de ingreso de Funcionarios</h4>
                
                <hr>

                @if (session()->has('create') && session('create') == 1)
                    <div class="alert alert-success">
                        <h6>El Funcionario se creo correctamente.</h6>
                    </div>
                @endif
                
                @if (session()->has('create') && session('create') == 0)
                    <div class="alert alert-danger">
                        <h6>Ocurrio un error, contacte al desarrollador.</h6>
                    </div>
                @endif

                @if (session()->has('ingreso') && session('ingreso') == 1)
                    <div class="alert alert-success">
                        <h6>Se registro el ingreso correctamente</h6>
                    </div>
                @endif
                
                @if (session()->has('ingreso') && session('ingreso') == 0)
                    <div class="alert alert-danger">
                        <h6>Ocurrio un error, contacte al desarrollador.</h6>
                    </div>
                @endif

                @if (session()->has('ingreso') && session('ingreso') == 2)
                    <div class="alert alert-danger">
                        <h6>Ya hay un registro hoy de esta persona.</h6>
                    </div>
                @endif

                <div class="row p-xl-3 p-md-3">                   
                    <div class="table-responsive" id="Resultados">
                        
                        @php
                            $hoy = \Carbon\Carbon::now('America/Bogota')->isoFormat('Y-MM-DD');
                        @endphp

                        <div class="page-title-box py-2">
                            <div class="row mx-0 align-items-center">

                                <form class="row col-12 justify-content-center" method="POST" action="/control/search"> 
                                    @csrf

                                    <div class="form-group mb-0 col-lg-6">
                                        <div class="input-group mb-0">
                                            <input type="text" class="form-control" placeholder="Numero de identificacion" name="identificacion_search" required />
                                            <div class="input-group-append">
                                                <button class="btn btn-success" type="submit" id="project-search-addon"><i class="mdi mdi-magnify search-icon font-12"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                                <div class="col-8">
                                    <h6>Fecha: {{ $hoy }} </h6>
                                </div>
                                <div class="col-4">
                                    <div class="float-right">
                                        <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light float-right" data-toggle="modal" data-target="#crearFuncionario" type="button">
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
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Ultimo Ingreso</th>
                                    <th scope="col">Temperatura</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($funcionarios as $item)
                                    @php
                                        if (!isset($item->ingresos[0]['fecha'])) {
                                            continue;
                                        }
                                        $ultimoIngreso = isset($item->ingresos[0]['fecha']) ? $item->ingresos[0]['fecha'] : '2000-00-00';
                                    @endphp
                                    <tr>
                                        <th scope="row">
                                            <a href="#">{{ $item->identificacion }}</a>
                                        </th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->tipo }}</td>
                                        <td>{{ isset($item->ingresos[0]['fecha']) ? $item->ingresos[0]['fecha'] : '' }}</td>
                                        <td>{{ isset($item->ingresos[0]['fecha']) ? $item->ingresos[0]['temperatura'] : '' }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-outline-info btn-sm" <?php echo $hoy <= $ultimoIngreso ? 'disabled' : '' ?> onclick="registrarIngreso({{ $item->id }}, '{{ $item->name }}')" data-toggle="tooltip" data-placement="top" title="Registrar ingreso">
                                                <i class="mdi mdi-pencil"></i>
                                            </button>
                                            
                                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="historialIngresos({{ $item->id }})" data-toggle="tooltip" data-placement="top" title="Ver Historial">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                
                {{ $funcionarios->links() }}

            </div>
        </div>
    </div> <!-- end col -->
</div>

{{-- Modal Agregar --}}
<div class="modal fade bs-example-modal-lg" id="crearFuncionario" tabindex="-1" role="dialog" aria-labelledby="modal-blade-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modal-blade-title">Agregar Funcionario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-blade-body">
                <form action="/control/create" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="identificacion" class="col-sm-2 col-form-label">Identificacion</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="identificacion" id="identificacion" placeholder="Escriba la identificacion" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="name" id="name" placeholder="Escriba el nombre" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="telefono" class="col-sm-2 col-form-label">Telefono</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="telefono" id="telefono" placeholder="Escriba el telefono" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="edad" class="col-sm-2 col-form-label">Edad</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="number" name="edad" id="edad" placeholder="Escriba la edad" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" name="email" id="email" placeholder="Escriba el correo"  />
                        </div>
                    </div>

                    <input type="hidden" value="{{ Request::path() == 'control/funcionarios' ? 'Funcionario' : 'Cliente' }}" name="tipo" />

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
                            <input class="form-control disabled" type="text" name="fecha" id="fecha" value="{{ $hoy }}" />
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
                        <label for="contagiados" class="col-sm-6 col-form-label">¿Has tenido contacto con personas que tengan o hayan tenido coronavirus (covid-19)?</label>
                        <div class="col-sm-6">
                            <select name="contagiados" id="contagiados" class="form-control" required>
                                <option value="No">No</option>
                                <option value="Si">Si</option>
                            </select>
                        </div>
                    </div>

                    <input type="hidden" value="{{ Request::path() == 'control/funcionarios' ? 'Funcionario' : 'Cliente' }}" name="tipo" />

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
        



