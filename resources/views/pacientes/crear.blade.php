@extends('layouts.app')
@section('styles1')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection
@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Registrar paciente</h3>
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
                          <form action="{{route('pacientes.store')}}" method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="propietarios">Datos del propietario</label>
                                <select name="propietarios[]" id="propietarios1" data-style="btn-primary" title="Seleccionar propietario" class="form-control selectpicker" required>
                                    @foreach($propietarios as $propietario)
                                    <option value="{{$propietario->id}}">{{$propietario->CI}}--{{$propietario->nombre}}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="nombre" >Nombre</label>
                                        <input type="text" name="nombre" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="form-group">
        <label for="apellido">Tamaño</label>
        <select name="apellido" id="apellido" title="Tamaño" class="form-control selectpicker">
            <option value="Pequeño">Pequeño</option>
            <option value="Mediano">Mediano</option>
            <option value="Grande">Grande</option>
        </select>
    </div>
</div>
                                
                                
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group" >
                                            <label for="color" >Color</label>
                                            <input type="text" name="color" class="form-control">
                                        </div>
                                    </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="edad" >Edad</label>
                                        <input type="number" name="edad" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="fechaN" >Fecha de nacimiento</label>
                                        <input type="date" name="fechaN" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="especies">Especie</label>
                                    <select name="especies[]" id="especies" class="form-control selectpicker"
                                    data-style="btn-primary" title="Seleccionar especie "  required>
                                    @foreach($especies as $especie)
                                     <option value="{{$especie->id}}">{{$especie->nombre}}</option>

                                    @endforeach
                                
                                </select>

                                </div>
                                <div class="form-group">
                                    <label for="razas">Raza</label>
                                    <select name="razas[]" id="razas" class="form-control selectpicker"
                                    data-style="btn-primary" title="Seleccionar raza "  required>
                                    @foreach($razas as $raza)
                                     <option value="{{$raza->id}}">{{$raza->nombre}}</option>
                                    @endforeach
                                
                                </select>

                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="vacunas" >Vacunas</label>
                                        <input type="text" name="vacunas" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="alergias" >Alergias</label>
                                        <input type="text" name="alergias" class="form-control">
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
  
    <script>
        new MultiSelectTag('propietarios')  // id
    </script>
    
   
@endsection
@section('scripts1')

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@endsection