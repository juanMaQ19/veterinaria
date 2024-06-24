@extends('layouts.app')
@section('styles1')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection


@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Editar medico</h3>
        </div>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/css/multi-select-tag.css">

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @if ($errors->any())
                                <div class="alert alert-dark alert-dismissible fade show" role="alert">
                                    <strong>¡Revise los campos!</strong>
                                    @foreach ($errors->all() as $error)
                                        <span class="badge badge-danger">{{ $error }}</span>
                                    @endforeach
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif

                            <form action="{{ route('medicos.update', $medico->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="nombre">Nombre</label>
                                            <input type="text" name="nombre" class="form-control" value="{{ $medico->nombre }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="apellido">Apellido</label>
                                            <input type="text" name="apellido" class="form-control" value="{{ $medico->apellido }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="CI">CI</label>
                                            <input type="number" name="CI" class="form-control" value="{{ $medico->CI }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="telefono">Telefono</label>
                                            <input type="number" name="telefono" class="form-control" value="{{ $medico->telefono }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="direccion">Direccion</label>
                                            <input type="text" name="direccion" class="form-control" value="{{ $medico->direccion }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group">
                                            <label for="sexo">Sexo</label>
                                            <select name="sexo" id="sexo" class="form-control selectpicker">
                                                <option value="hombre" {{ $medico->sexo == 'hombre' ? 'selected' : '' }}>Hombre</option>
                                                <option value="mujer" {{ $medico->sexo == 'mujer' ? 'selected' : '' }}>Mujer</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="especialidades">Especialidades</label>
                                    <select name="especialidades[]" id="especialidades" class="form-control selectpicker"
                                    data-style="btn-primary" title="Seleccionar especialidades " multiple required>
                                    @foreach($especialidades as $especialidad)
                                     <option value="{{$especialidad->id}}">{{$especialidad->nombre}}</option>

                                    @endforeach
                                
                                </select>

                                </div>
                                <br>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag/dist/js/multi-select-tag.js"></script>

   

@endsection
@section('scripts1')

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    $(document).ready(()=>{});
    $('#especialidades').selectpicker('val',@json($especialidad_ids) );
</script>

@endsection
