@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Propietarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{route('propietarios.create')}}">Agregar propietario</a>
                            <div class="card-body">
                                @if(session('notificacion'))
                                <div class="alert alert-success" role="alert">
                                    {{session('notificacion')}}
                                </div>
                                @endif
                                <div class="form-container">
                                    <form action="{{ route('propietarios.search') }}" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" name="query" class="form-control" placeholder="Buscar  propietario por carnet">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="form-container">
                                    <form action="{{ route('propietarios.index') }}" method="GET">
                                        <button type="submit" class="btn btn-primary">Mostrar todos los propietarios</button>
                                    </form>
                                </div>
                                


                            </div>
                            <div class="table-responsive-sm">
                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display :none;">ID</th>
                                    <th style="color:#fff">CI </th>
                                    <th style="color:#fff">Nombre </th>
                                    <th style="color:#fff">Apellido </th>
                                    <th style="color:#fff">Telefono 1</th>
                                    <th style="color:#fff">Telefono 2 </th>
                                    <th style="color:#fff">Direccion </th>
                                    <th style="color:#fff;">Sexo</th>
                                    <th style="color:#fff;">Acciones</th>


                                </thead>
                            
                                <tbody>
                                    @foreach($propietarios as $propietario)
                                    <tr>
                                        <td style="display: none;">{{$propietario->id}}</td>
                                        <td>{{$propietario->CI}}</td>
                                        <td>{{$propietario->nombre}}</td>
                                        <td>{{$propietario->apellido}}</td>
                                     
                                        <td>{{$propietario->tel1}}</td>
                                        <td>{{$propietario->tel2}}</td>
                                        <td>{{$propietario->direccion}}</td>
                                        <td>{{$propietario->sexo}}</td>
                                        
                                        
                                        <td>
                                            <form action="{{route('propietarios.destroy',$propietario->id)}}" method="POST">
                                          
                                                <a class="btn btn-info" href="{{ route('propietarios.edit', $propietario->id)}}">Editar</a>
                                                 
                                                    
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
                                {!!$propietarios->links() !!}

                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

@endsection
