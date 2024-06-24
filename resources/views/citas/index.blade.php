@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Citas</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-inline-block"> <!-- Contenedor para los botones -->
                                <a class="btn btn-warning" href="{{ route('citas.create') }}">Agregar cita</a>
                                <a class="btn btn-warning ml-2" href="{{ route('citas.calendar') }}">Ver citas</a>
                            </div>
                            <div class="card-body">
                                @if(session('notificacion'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('notificacion') }}
                                    </div>
                                @endif
                            </div>
                            <div class="form-container">
                                <form action="{{ route('citas.index') }}" method="GET">
                                    <div class="input-group">
                                        <input type="text" class="form-control" name="query" placeholder="Buscar por carnet del propietario">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="submit">Buscar</button>
                                        </div>
                                    </div>
                                </form>
                                <form action="{{ route('citas.index') }}" method="GET">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary mt-2">Mostrar todas las citas</button>
                                    </div>
                                </form>
                            </div>
                            
                            <div class="table-responsive-sm">
                                @if($citas->isEmpty())
                                    <div class="alert alert-info" role="alert">
                                        No se encontraron citas.
                                    </div>
                                @else
                                    <table class="table table-striped mt-2">
                                        <thead style="background-color:#6777ef">
                                            <tr>
                                                <th style="display: none;">ID</th>
                                                <th style="color:#fff">Paciente</th>
                                                <th style="color:#fff">Médico</th>
                                                <th style="color:#fff">Fecha</th>
                                                <th style="color:#fff">Horario</th>
                                                <th style="color:#fff">Estado</th>
                                                <th style="color:#fff;">Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($citas as $cita)
                                                <tr>
                                                    <td style="display: none;">{{ $cita->id }}</td>
                                                    <td>
                                                        @foreach($cita->pacientes as $paciente)
                                                            {{ $paciente->nombre }}
                                                            @if(!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    
                                                    <td>
                                                        @foreach($cita->medicos as $medico)
                                                            {{ $medico->nombre }}
                                                            @if(!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $cita->fecha }}</td>
                                                    <td>
                                                        @foreach($cita->horarios as $horario)
                                                            {{ $horario->horario }}
                                                            @if(!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $cita->estado }}</td>
                                                    <td>
                                                        <form action="{{ route('citas.destroy', $cita->id) }}" method="POST">
                                                            <a class="btn btn-info" href="{{ route('citas.edit', $cita->id) }}">Editar</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Borrar</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="pagination justify-content-end">
                                        {!! $citas->links() !!}
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
