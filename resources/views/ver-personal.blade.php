@extends('layouts.app')

@section('jsMain') <script src="assets/js/peticiones.js"></script> @endsection

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
                                            <button type="button" class="btn btn-outline-secondary btn-sm" onclick="codeQr({{ $item->id }})" data-toggle="tooltip" data-placement="top" title="Ver Codigo QR">
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
                <div id="codeQr">
                    
                </div>    
            </div>
        </div>
    </div>
</div>
@endsection