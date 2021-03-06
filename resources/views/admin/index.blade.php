@extends('layouts.app')
@section('content')
<div class="container-fluid" id="app">
    <div class="row">
        <div class="col-md-6">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-md-6">
                            <h3 class="panel-title">Mis cabañas</h3>
                        </div>
                        <div class="col-md-6">
                            <a class="btn btn-primary pull-right" data-toggle="modal" href='#crear_cabana'>Registrar Cabaña</a>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Nombre</th>
                                    <th>Tipo</th>
                                    <th>Disponibilidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cabañas as $key => $cabaña)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$cabaña->nombre}}</td>
                                    <td>{{$cabaña->tipo}}</td>
                                    <td>{{$cabaña->disponibilidad}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Reservaciones -->
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title">Últimas reservaciones</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Teléfono</th>
                            <th>Email</th>
                            <th>Fecha Llegada</th>
                            <th>Fecha Salida</th>
                            <th>Tipo Cabaña</th>
                            <th>Anticipo</th>
                            <th>Guardar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reservaciones as $key => $reservacion)
                        <tr>
                            <td>{{$key+1}}</td>
                            <td>{{$reservacion->nombre}}</td>
                            <td>{{$reservacion->apellidos}}</td>
                            <td>{{$reservacion->telefono}}</td>
                            <td>{{$reservacion->email}}</td>
                            <td>{{$reservacion->fecha_llegada}}</td>
                            <td>{{$reservacion->fecha_salida}}</td>
                            <td>{{$reservacion->tipo}}</td>
                            <td>
                                {!! Form::open(['url' => '/reservar/' . $reservacion->id . '/edit']) !!}
                                    <div class="form-group{{ $errors->has('anticipo') ? ' has-error' : '' }}">
                                        {!! Form::text('anticipo', $reservacion->anticipo, ['class' => 'form-control', 'required' => 'required']) !!}
                                        <small class="text-danger">{{ $errors->first('anticipo') }}</small>
                                    </div>
                                
                            </td>
                            <td>
                                <button type="submit" class="btn btn-warning">Guardar</button>
                                {!! Form::close() !!}
                            </td>
                            <td>
                                {!! Form::open(array('class' => 'form-inline', 'method' => 'DELETE', 'url' => '/reservar')) !!}
                                    {!! Form::hidden('id', $reservacion->id) !!}
                                    {!! Form::submit('Eliminar', array('class' => 'btn btn-danger')) !!}
                                {!! Form::close() !!}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<!-- Modals -->

<div class="modal fade" id="crear_cabana">
    <div class="modal-dialog">
        {!! Form::open(['url' => '/admin/registrar_cabana']) !!}
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Registrar Cabaña</h4>
            </div>

            <div class="modal-body">
                    <div class="form-group{{ $errors->has('nombre') ? ' has-error' : '' }}">
                        {!! Form::label('nombre', 'Nombre') !!}
                        {!! Form::text('nombre', null, ['class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('nombre') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('tipo') ? ' has-error' : '' }}">
                        {!! Form::label('tipo', 'Tipo') !!}
                        {!! Form::select('tipo',[1 => '1 habitación/2 personas', 2 => '2 habitaciones/4 personas', 3 => '3 habitaciones/6 personas', 4 => 'Temazcal'], 1, ['id' => 'tipo', 'class' => 'form-control', 'required' => 'required']) !!}
                        <small class="text-danger">{{ $errors->first('tipo') }}</small>
                    </div>        
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection