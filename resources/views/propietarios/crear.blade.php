@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Agregar propietario</h3>
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
                          <form action="{{route('propietarios.store')}}" method="POST">
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
                                        <label for="tel1" >Telefono 1</label>
                                        <input type="number" name="tel1" class="form-control">
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-12">
                                    <div class="form-group" >
                                        <label for="tel2" >Telefono 2</label>
                                        <input type="number" name="tel2" class="form-control">
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
        <label for="sexo">Sexo</label>
        <select name="sexo" id="sexo1" title="Sexo" class="form-control selectpicker">
            <option value="Hombre">Hombre</option>
            <option value="Mujer">Mujer</option>
        </select>
    </div>
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
        new MultiSelectTag('sexo')  // id
    </script>
    
@endsection