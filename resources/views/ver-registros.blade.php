@extends('layouts.app')

@section('jsMain') 
    <script src="{{ asset('assets/js/peticiones.js') }}"></script> 
@endsection


@section('title') Historial Usuario @endsection
@section('title_content') Historial Usuario @endsection

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="row">
                    <div class="col">
                        <div class="card-header float-left">
                            <a href="/control/funcionarios" class="btn btn-outline-info btn-sm" >Volver a lista</a>
                        </div>
                        
                    </div>
                </div>
                <div class="card-header d-flex justify-content-between align-items-center">
                </div>
                <div class="card-body"> 
                    
                  @if ( session('mensaje') )
                    <div class="alert alert-success">{{ session('mensaje') }}</div>
                  @endif
                    <div class="table-responsive " style="text-align:center;">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Tipo</th>
                                    <th scope="col">Cédula</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>{{ $funcionarios[0]->name }}</td>
                                        <td>{{ $funcionarios[0]->tipo }}</td>
                                        <td>{{ $funcionarios[0]->identificacion }}</td>
                                    </tr>   
                            </tbody>
                        </table>
                    </div>
                
                    @foreach ($funcionarios[0]->ingresos as $item)
                    <h5 class="text-center">Bitácora Covid-19</h5>
                    <br>
                        <div class="row">
                            <label for="fecha" class="col-sm-1 col-form-label">Fecha</label>
                            <div class="col-sm-2">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->fecha}}" />
                            </div>
                            <label for="estado" class="col-sm-2 col-form-label">¿Como se siente?</label>
                            <div class="col-sm-2">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->estado}}" />
                            </div>
                            <label for="temperatura" class="col-sm-2 col-form-label">Temperatura</label>
                            <div class="col-sm-2">
                                <input disabled class="form-control" type="number" step="any" name="temperatura" id="temperatura"  required value="{{$item->temperatura}}"/>
                            </div>
                        </div>
                            <br>
                        <div class="row">
                            <label for="contagiados" class="col-sm-7 col-form-label">¿Has tenido contacto con personas que tengan o hayan tenido coronavirus (covid-19)?</label>
                            <div class="col-sm-2">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->contagiados}}" />
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="dolor" class="col-sm-3 col-form-label">¿Presenta dolor de garganta?</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->dolor}}" />  
                            </div>
                            <label for="fiebre" class="col-sm-2 col-form-label">¿Presenta fiebre?</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->fiebre}}" />
                            </div>
                            <label for="tos" class="col-sm-2 col-form-label">¿Presenta tos?</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->tos}}" />
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="dificultad" class="col-sm-3 col-form-label">¿Presenta dificultad para respirar?</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->dificultad}}" />
                            </div>
                            <label for="fatiga" class="col-sm-2 col-form-label">¿Presenta fatiga?</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->fatiga}}" />
                            </div>
                            <label for="escalofrio" class="col-sm-2 col-form-label">¿Presenta escalofrio?</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->escalofrio}}" />
                            </div>
                        </div>
                        <div class="row">
                            <label for="musculo" class="col-sm-3 col-form-label">¿Presenta dolor muscular?</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->musculo}}" />
                            </div>
                        </div>
                    @endforeach
                
                
                    @foreach ($funcionarios as $item)
                    <br>
                        <h5 class="text-center">ENCUESTA CONTROL Y PREVENCIÓN COVID-19</h5>
                    <br>
                    <div class="row">
                            <label for="fecha" class="col-sm-2 col-form-label">Direccion</label>
                            <div class="col-sm-2">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->direccion}}" />
                            </div>
                            <label for="estado" class="col-sm-2 col-form-label">Barrio</label>
                            <div class="col-sm-2">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->barrio}}" />
                            </div>
                            <label for="temperatura" class="col-sm-2 col-form-label">Telefono</label>
                            <div class="col-sm-2">
                                <input disabled class="form-control" type="number" step="any" name="temperatura" id="temperatura"  required value="{{$item->telefono}}"/>
                            </div>
                        </div>
                            <br>
                        <div class="row">
                            <label for="contagiados" class="col-sm-3 col-form-label">¿Medio de transporte?</label>
                            <div class="col-sm-3">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->transporte}}" />
                            </div>
                            <label for="dolor" class="col-sm-3 col-form-label">Tiempo de la casa al trabajo</label>
                            <div class="col-sm-2">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->tiempo}}" />  
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="fiebre" class="col-sm-2 col-form-label">Diabetes</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->diabetes}}" />
                            </div>
                            <label for="fiebre" class="col-sm-3 col-form-label">Enfermedad cardio vascular</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->diabetes}}" />
                            </div>
                            <label for="dificultad" class="col-sm-3 col-form-label">enfermedad pulmonar</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->pulmonar}}" />
                            </div>
                            
                            
                        </div>
                        <br>
                        <div class="row">
                            <label for="fatiga" class="col-sm-2 col-form-label">Obesidad</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->obesidad}}" />
                            </div>
                            <label for="fatiga" class="col-sm-3 col-form-label">N° personas con la que convive</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->personas_convive}}" />
                            </div>
                            <label for="escalofrio" class="col-sm-3 col-form-label">Rango de edad de las personas</label>
                            <div class="col-sm-2">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->rango}}" />
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="musculo" class="col-sm-2 col-form-label">Campo de la salud</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->campo_salud}}" />
                            </div>
                            <label for="musculo" class="col-sm-3 col-form-label">Enfermedad Inmunosupresora</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->enfermedad_inmunosupresora}}" />
                            </div>
                            <label for="musculo" class="col-sm-2 col-form-label">Hipertensión</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->hipertension}}" />
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <label for="musculo" class="col-sm-3 col-form-label">Enfermedad pulmonar</label>
                            <div class="col-sm-1">
                                <input disabled class="form-control disabled" type="text" name="fecha" id="fecha" value="{{$item->enfermedad_pulmonar}}" />
                            </div>
                        </div>
                    @endforeach
               
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
    <table class="table">
    <thead class="thead-dark">
        <tr>
            <th colspan="2" >Fecha</th>
            <th scope="col" >Estado</th>
            <th scope="col">Temperatura</th>
            <th scope="col">Contacto Covid</th>
            <th scope="col">Dolor Garganta</th>
            <th scope="col">Fiebre</th>
            <th scope="col">Tos</th>
            <th scope="col">Dificultad al respirar</th>
            <th scope="col">Fatiga</th>
            <th scope="col">Escalofrío</th>
            <th scope="col">Dolor Muscular</th>
        </tr>
    </thead>
    @foreach ($funcionarios[0]->ingresos as $item)
        <tbody>
            <tr>
                <td colspan="2">{{$item->fecha}}</th>
                <td>{{$item->estado}}</td>
                <td>{{$item->temperatura}}</td>
                <td>{{$item->contagiados}}</td>
                <td>{{$item->dolor}}</td>
                <td>{{$item->fiebre}}</td>
                <td>{{$item->tos}}</td>
                <td>{{$item->dificultad}}</td>
                <td>{{$item->fatiga}}</td>
                <td>{{$item->escalofrio}}</td>
                <td>{{$item->musculo}}</td>
            </tr>
        </tbody>
    @endforeach
    </table>
{{ $funcionarios->links() }}
    </div>
</div>
@endsection