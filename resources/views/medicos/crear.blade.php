@extends('layouts.app')
@section('styles1')
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">

@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Agregar medico</h3>
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
                          <form action="{{route('medicos.store')}}" method="POST">
                            @csrf
                            
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="nombre" >Nombre</label>
                                        <input type="text" name="nombre" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="apellido" >Apellido</label>
                                        <input type="text" name="apellido" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-12 col-md-12">
                                        <div class="form-group" >
                                            <label for="CI" >CI</label>
                                            <input type="number" name="CI" class="form-control">
                                        </div>
                                    </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="telefono" >Telefono</label>
                                        <input type="number" name="telefono" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="direccion" >Direccion</label>
                                        <input type="text" name="direccion" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group">
                                        <label for="sexo" >Sexo</label>
                                <select name="sexo" id="sexo" title="Sexo" class="form-control selectpicker" >
                                    <option value="hombre">Hombre</option>
                                    <option value="mujer">Mujer</option>
                                </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="especialidades">Especialidades</label>
                                    <select name="especialidades[]" id="especialidades"
                                    data-style="btn-primary" title="Seleccionar especialidades " multiple required>
                                    @foreach($especialidades as $especialidad)
                                     <option value="{{$especialidad->id}}">{{$especialidad->nombre}}</option>

                                    @endforeach
                                
                                </select>

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
        new MultiSelectTag('especialidades')  // id
    </script>
    
@endsection
@section('scripts1')

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>

@endsection