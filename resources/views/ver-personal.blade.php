@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="mt-0 header-title">Todo el Personal</h4>
                <hr>

                <div class="row p-5">                   
                    <div class="table-responsive mb-3" id="Resultados">
                        <table class="table table-centered table-hover table-bordered mb-0">
                            <thead>
                            <!--Fin parte de busqueda de datos-->
                                <tr>
                                    <th scope="col">N°</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Sede</th>
                                    <th scope="col">Cargo</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personal as $item)
                                    <tr>
                                        <th scope="row">
                                            <a href="#">{{ $item->identificacion }}</a>
                                        </th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->sede }}</td>
                                        <td>{{ $item->cargo }}</td>
                                        <td>{{ $item->estado }}</td>
                                        <td class="text-center">
                                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="verPQR({{ $item->num_correo }})" data-toggle="tooltip" data-placement="top" title="Ver Codigo QR">
                                                <i class="mdi mdi-eye"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                
                {{ $personal->links() }}

            </div>
        </div>
    </div> <!-- end col -->
</div>
@endsection