@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Médicos</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{ route('medicos.create') }}">Agregar médico</a>
                            <div class="card-body">
                                @if(session('notificacion'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('notificacion') }}
                                    </div>
                                @endif
                            </div>

                            <form id="search-form" method="GET">
                                <div class="form-group">
                                    <label for="query">Buscar médico por nombre, CI o especialidad:</label>
                                    <input type="text" name="query" id="query" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>
                            <div class="form-container mt-3">
                                <form action="{{ route('medicos.index') }}" method="GET">
                                    <button type="submit" class="btn btn-primary">Mostrar todos los médicos</button>
                                </form>
                            </div>

                            <div class="mt-3">
                                @if($medicoNoEncontrado)
                                    <div class="alert alert-warning" role="alert">
                                        No se encontró ningún médico con los criterios de búsqueda.
                                    </div>
                                    <a class="btn btn-secondary" href="{{ route('medicos.index') }}">Ver todos los médicos</a>
                                @endif
                            </div>

                            <div class="table-responsive-sm mt-3">
                                @if($medicos->count() > 0)
                                    <table class="table table-striped mt-2">
                                        <thead style="background-color:#6777ef">
                                            <th style="display: none;">ID</th>
                                            <th style="color:#fff">Nombre</th>
                                            <th style="color:#fff">Apellido</th>
                                            <th style="color:#fff">CI</th>
                                            <th style="color:#fff">Teléfono</th>
                                            <th style="color:#fff">Dirección</th>
                                            <th style="color:#fff;">Sexo</th>
                                            <th style="color:#fff;">Especialidades</th>
                                            <th style="color:#fff;">Acciones</th>
                                        </thead>
                                        <tbody>
                                            @foreach($medicos as $medico)
                                                <tr>
                                                    <td style="display: none;">{{ $medico->id }}</td>
                                                    <td>{{ $medico->nombre }}</td>
                                                    <td>{{ $medico->apellido }}</td>
                                                    <td>{{ $medico->CI }}</td>
                                                    <td>{{ $medico->telefono }}</td>
                                                    <td>{{ $medico->direccion }}</td>
                                                    <td>{{ $medico->sexo }}</td>
                                                    <td>
                                                        @foreach($medico->especialidades as $especialidad)
                                                            {{ $especialidad->nombre }}
                                                            @if(!$loop->last)
                                                                ,
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                    <td>
                                                        <form action="{{ route('medicos.destroy', $medico->id) }}" method="POST">
                                                            <a class="btn btn-info" href="{{ route('medicos.edit', $medico->id) }}">Editar</a>
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
                                        {!! $medicos->links() !!}
                                    </div>
                                @else
                                    <div class="alert alert-info" role="alert">
                                        No hay médicos registrados.
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
