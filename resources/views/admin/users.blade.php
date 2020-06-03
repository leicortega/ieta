@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Control de Usuarios</h4>
                
                <hr>

                @if (session()->has('create') && session('create') == 1)
                    <div class="alert alert-success">
                        <h6>El Usuario se creo correctamente.</h6>
                    </div>
                @endif
                
                @if (session()->has('create') && session('create') == 0)
                    <div class="alert alert-danger">
                        <h6>Ocurrio un error, contacte al desarrollador.</h6>
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
                                        <button class="btn btn-primary dropdown-toggle arrow-none waves-effect waves-light float-right" data-toggle="modal" data-target="#crearUsuario" type="button">
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
                                    <th scope="col">Correo</th>
                                    <th scope="col">Sede</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col" class="text-center">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $item)
                                    <tr>
                                        <th scope="row">
                                            <a href="#">{{ $item->id }}</a>
                                        </th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->sede }}</td>
                                        <td>admin</td>
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
                
                {{ $users->links() }}

            </div>
        </div>
    </div> <!-- end col -->
</div>

{{-- Modal Agregar --}}
<div class="modal fade bs-example-modal-lg" id="crearUsuario" tabindex="-1" role="dialog" aria-labelledby="modal-blade-title" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="modal-blade-title">Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" id="modal-blade-body">
                <form action="/admin/users/create" method="POST">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="text" name="name" id="name" placeholder="Escriba el nombre" required />
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="email" class="col-sm-2 col-form-label">Correo</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="email" name="email" id="email" placeholder="Escriba el correo"  />
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label for="password" class="col-sm-2 col-form-label">Contraseña</label>
                        <div class="col-sm-10">
                            <input class="form-control" type="password" name="password" id="password" placeholder="Escriba la contraseña" required />
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="sede" class="col-sm-2 col-form-label">Sede</label>
                        <div class="col-sm-10">
                            <select name="sede" id="sede" class="form-control" required>
                                <option value="">Seleccione la sede</option>
                                <option value="Principal">Principal</option>
                                <option value="Pitalito">Pitalito</option>
                                <option value="Bogota">Bogota</option>
                                <option value="La Plata">La Plata</option>
                                <option value="Florencia">Florencia</option>
                                <option value="Terminal Neiva">Terminal Neiva</option>
                                <option value="EDS Principal">EDS Principal</option>
                                <option value="EDS Terminal">EDS Terminal</option>
                                <option value="EDS Igabue">EDS Ibague</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="tipo" class="col-sm-2 col-form-label">Tipo</label>
                        <div class="col-sm-10">
                            <select name="tipo" id="tipo" class="form-control" required>
                                <option value="">Seleccione el tipo</option>
                                <option value="admin">admin</option>
                                <option value="general">general</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="permiso" class="col-sm-2 col-form-label">Permiso</label>
                        <div class="col-sm-10">
                            <select name="permiso" id="permiso" class="form-control" required>
                                <option value="">Seleccione el Permiso</option>
                                @foreach (\Spatie\Permission\Models\Permission::all() as $permiso)
                                    <option value="{{ $permiso->name }}">{{ $permiso->name }}</option>
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