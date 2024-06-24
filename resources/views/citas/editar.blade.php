@extends('layouts.app')

@section('styles1')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar Cita</h3>
        </div>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach($errors->all() as $error)
                                        <span class="badge badge-danger">{{$error}}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Cerrar">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('citas.update', $cita->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="medicos">Medico</label>
                                    <select name="medicos[]" id="medicos" class="form-control selectpicker"
                                            data-style="btn-primary" title="Seleccionar especialidades" required multiple>
                                        @foreach($medicos as $medico)
                                            <option value="{{ $medico->id }}" {{ in_array($medico->id, $cita->medicos->pluck('id')->toArray()) ? 'selected' : '' }}>{{ $medico->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="pacientes">Paciente</label>
                                    <select name="pacientes[]" id="pacientes" class="form-control selectpicker"
                                            data-style="btn-primary" title="Seleccionar pacientes" required multiple>
                                        @foreach($pacientes as $paciente)
                                            <option value="{{$paciente->id}}" {{ in_array($paciente->id, $cita->pacientes->pluck('id')->toArray()) ? 'selected' : '' }}>{{$paciente->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fecha">Fecha</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control datepicker" name="fecha" id="fecha" placeholder="Seleccionar fecha" type="date" value="{{ $cita->fecha }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select name="estado" id="estado" title="estado" class="form-control selectpicker">
                                            <option value="pendiente" {{ $cita->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                                            <option value="aprobado" {{ $cita->estado == 'aprobado' ? 'selected' : '' }}>Aprobado</option>
                                        </select>
                                    </div>
                                </div>

                               
                                <div class="form-group">
                                    <label for="horario">Horarios disponibles</label>
                                    <select name="horario[]" id="horario" class="form-control selectpicker" multiple>
                                        @foreach($horariosDisponibles as $horarioDisponible)
                                            <option value="{{ $horarioDisponible }}" {{ in_array($horarioDisponible, $horariosAsignados) ? 'selected' : '' }}>
                                                {{ $horarioDisponible }}
                                            </option>
                                        @endforeach
                                        @if (empty($horariosAsignados))
                                            <option value="" selected>Horario actual: {{ $cita->horarios->first()->horario }}</option>
                                        @endif
                                    </select>
                                </div>
                                
                                
                                
                                

                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
    <script>
       
        new MultiSelectTag('medicos');
        new MultiSelectTag('pacientes');  // id
    </script>
@endsection

@section('scripts1')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection
