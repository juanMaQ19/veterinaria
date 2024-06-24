@extends('layouts.app')

@section('styles1')
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Agregar cita</h3>
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

                            <form id="search-form" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="query">Buscar por carnet del propietario:</label>
                                    <input type="text" name="query" id="query" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Buscar</button>
                            </form>

                      

                            <form action="{{route('citas.store')}}" method="POST">
                                @csrf
                                <div id="pacientes-result">
                                    @if($pacientes->count() > 0)
                                        <div class="form-group">
                                            <label for="pacientes">Paciente</label>
                                            <select name="pacientes[]" id="pacientes" class="form-control selectpicker"
                                                    data-style="btn-primary" title="Seleccionar al paciente" required >
                                                @foreach($pacientes as $paciente)
                                                    <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    @else
                                        <p>No se encontraron pacientes para el propietario.</p>
                                    @endif
                                </div>
                
                                <div class="form-group">
                                    <label for="medicos">Medico</label>
                                    <select name="medicos[]" id="medicos" class="form-control selectpicker"
                                            data-style="btn-primary" title="Seleccionar al medico " required>
                                        @foreach($medicos as $medico)
                                            <option value="{{$medico->id}}">{{$medico->nombre}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="fecha">Fecha</label>
                                        <div class="input-group">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text"><i
                                                            class="ni ni-calendar-grid-58"></i></span>
                                            </div>
                                            <input class="form-control datepicker" name="fecha" id="fecha"
                                                   placeholder="Seleccionar fecha" type="date">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="estado">Estado</label>
                                        <select name="estado" id="estado" title="estado"
                                                class="form-control selectpicker">
                                            <option value="pendiente">Pendiente</option>
                                            <option value="aprobado">Aprobado</option>
                                        </select>
                                    </div>
                                </div>
                               <div class="form-group">
    <label for="horario">Horarios disponibles</label>
    <select name="horario[]" id="horario" class="form-control">
        @foreach($horariosDisponibles as $horario)
            <option value="{{ $horario }}">{{ $horario }}</option>
        @endforeach
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
        document.getElementById('search-form').addEventListener('submit', function (e) {
            e.preventDefault(); // Evitar el envío del formulario
    
            var query = document.getElementById('query').value; // Obtener el valor de la consulta de búsqueda
    
            // Realizar la solicitud AJAX
            axios.post('{{ route('citas.search') }}', { query: query })
                .then(function (response) {
                    // Actualizar el contenido del contenedor de resultados
                    document.getElementById('pacientes-result').innerHTML = response.data;
                    $('.selectpicker').selectpicker('refresh'); // Actualizar el selectpicker
                })
                .catch(function (error) {
                    console.log(error);
                });
        });

        // Obtener la referencia al campo de selección de pacientes
        var pacientesSelect = document.getElementById('pacientes');

        // Escuchar el evento de cambio en el campo de selección de pacientes
        pacientesSelect.addEventListener('change', function() {
            // Obtener los valores seleccionados
            var selectedOptions = Array.from(pacientesSelect.selectedOptions).map(option => option.value);

            // Actualizar el valor del campo de selección de pacientes oculto
            document.getElementById('selected-pacientes').value = selectedOptions.join(',');
        });
    </script>
@endsection

@section('scripts1')
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
@endsection
