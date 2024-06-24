@extends('layouts.app')
@section('styles1')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Historial clinico</h3>
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
                          <form action="{{route('historial.store')}}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="pacientes">Paciente</label>
                                <select name="pacientes" id="pacientes1" class="selectpicker"
                                data-style="btn-primary" title="Seleccionar paciente "  required>
                                @foreach($pacientes as $paciente)
                                 <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
                                @endforeach
                            
                            </select>

                            </div> 
                             <div class="form-group">
                                <label for="medicos">Medico</label>
                                <select name="medicos[]" id="medicos1" class="selectpicker" 
                                data-style="btn-primary" title="Seleccionar medico "  required>
                                @foreach($medicos as $medico)
                                 <option value="{{$medico->id}}">{{$medico->nombre}},{{$medico->apellido}}</option>

                                @endforeach
                            
                            </select>

                            </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="fechaR" >Fecha</label>
                                        <input type="date" name="fechaR" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="temperatura" >Temperatura</label>
                                        <input type="text" name="temperatura" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group" >
                                            <label for="peso" >Peso</label>
                                            <input type="text" name="peso" class="form-control">
                                        </div>
                                    </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="diagnostico" >Diagnostico</label>
                                        <input type="text" name="diagnostico" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="diet" >Dieta</label>
                                        <input type="text" name="diet" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="analisis" >Analisis </label>
                                        <input type="text" name="analisis" class="form-control">
                                    </div>
                                </div>
                              
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="tratamiento" >Tratamiento</label>
                                        <input type="text" name="tratamiento" class="form-control">
                                    </div>
                                </div>
                             
                               
                                   
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>



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
    new MultiSelectTag('pacientes') 
</script>

@endsection