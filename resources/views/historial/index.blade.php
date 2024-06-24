@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Historial</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{ route('historial.create') }}">Agregar historial</a>
                            <a class="btn btn-warning" href="{{ route('historial.pdf') }}">generar pdf</a>
                            <div class="card-body">
                                @if(session('notificacion'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('notificacion') }}
                                    </div>
                                @endif
                            </div>

                            <form id="search-form" method="GET">
                                <div class="form-group">
                                    <label for="query">Buscar por nombre del paciente:</label>
                                    <input type="text" name="query" id="query" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>
                            <form action="{{ route('historial.index') }}" method="GET">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary mt-2">Mostrar todos los historiales</button>
                                </div>
                            </form>
                            <div class="mt-3">
                                @if($pacienteNoEncontrado)
                                    <div class="alert alert-warning" role="alert">
                                        No se encontró ningún paciente con los criterios de búsqueda.
                                    </div>
                                    <a class="btn btn-secondary" href="{{ route('historial.index') }}">Ver todos los historiales</a>
                                @endif
                            </div>

                            <div class="table-responsive-sm mt-3">
                                @if($historiales->count() > 0)
                                    <table class="table table-striped mt-2">
                                        <thead style="background-color:#6777ef">
                                            <th style="display: none;">ID</th>
                                            <th style="color:#fff">Paciente</th>
                                            <th style="color:#fff">Medico</th>
                                            <th style="color:#fff">Fecha</th>
                                            <th style="color:#fff">Temperatura</th>
                                            <th style="color:#fff">Peso</th>
                                            <th style="color:#fff">Diagnostico</th>
                                            <th style="color:#fff;">Dieta</th>
                                            <th style="color:#fff;">Analisis</th>
                                            <th style="color:#fff;">Tratamiento</th>
                                            <th style="color:#fff;">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach($historiales as $historial)
                                                <tr>
                                                    <td style="display: none;">{{ $historial->id }}</td>
                                                    <td>
                                                        @foreach($historial->pacientes as $paciente)
                                                            {{ $paciente->nombre }},
                                                            {{ $paciente->apellido }},
                                                            {{ $paciente->color }}
                                                            @if(!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        @foreach($historial->medicos as $medico)
                                                            {{ $medico->nombre }}
                                                            @if(!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>{{ $historial->fechaR }}</td>
                                                    <td>{{ $historial->temperatura }}</td>
                                                    <td>{{ $historial->peso }}</td>
                                                    <td>{{ $historial->diagnostico }}</td>
                                                    <td>{{ $historial->diet }}</td>
                                                    <td>{{ $historial->analisis }}</td>
                                                    <td>{{ $historial->tratamiento }}</td>
                                                    <td>
                                                        <form action="{{ route('historial.destroy', $historial->id) }}" method="POST">
                                                            <a class="btn btn-info" href="{{ route('historial.edit', $historial->id) }}">Editar</a>
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
                                        {!! $historiales->links() !!}
                                    </div>
                                @else
                                    <div class="alert alert-info" role="alert">
                                        No hay historiales clínicos registrados.
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
