@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Pacientes</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{route('pacientes.create')}}">Registrar paciente</a>
                            <div class="card-body">
                                @if(session('notificacion'))
                                <div class="alert alert-success" role="alert">
                                    {{session('notificacion')}}
                                </div>
                                @endif
                               
                                
                                <div class="form-container">
                                    <form action="{{ route('pacientes.search') }}" method="GET">
                                        <div class="input-group mb-3">
                                            <input type="text" name="query" class="form-control" placeholder="Buscar por carnet de propietario">
                                            <div class="input-group-append">
                                                <button class="btn btn-outline-secondary" type="submit">Buscar</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="form-container">
                                    <form action="{{ route('pacientes.index') }}" method="GET">
                                        <button type="submit" class="btn btn-primary">Mostrar todos los pacientes</button>
                                    </form>
                                </div>
                                

                            </div>
                            <div class="table-responsive-sm">
                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display :none;">ID</th>
                                    <th style="color:#fff">Nombre </th>
                                    <th style="color:#fff">Tamaño </th>
                                    <th style="color:#fff">Carnet del propietario </th>
                                    <th style="color:#fff">Color </th>
                                    <th style="color:#fff">Edad</th>
                                    <th style="color:#fff">Fecha de nacimiento</th>
                                    <th style="color:#fff;">Especie</th>
                                    <th style="color:#fff;">Raza</th>
                                    <th style="color:#fff;">Vacunas</th>
                                    <th style="color:#fff;">Alergias</th>
                                    <th style="color:#fff;">Acciones</th>


                                </thead>
                            
                                <tbody>
                                    @foreach($pacientes as $paciente)
                                    <tr>
                                        <td style="display: none;">{{$paciente->id}}</td>
                                        <td>{{$paciente->nombre}}</td>
                                        
                                        <td>{{$paciente->apellido}}</td>
                                        <td>
                                                @foreach($paciente->propietarios as $propietario)
                                                    {{$propietario->CI}}
                                                    @if(!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td>


                                        <td>{{$paciente->color}}</td>
                                     
                                       
                                        <td>{{$paciente->edad}}</td>
                                        <td>{{$paciente->fechaN}}</td>
                                        <td>
                                            @foreach($paciente->especies as $especie)
                                                {{$especie->nombre}}
                                                @if(!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>
                                            @foreach($paciente->razas as $raza)
                                                {{$raza->nombre}}
                                                @if(!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </td>
                                        <td>{{$paciente->vacunas}}</td>
                                        <td>{{$paciente->alergias}}</td>
                                        
                                        
                                        <td>
                                            <form action="{{route('pacientes.destroy',$paciente->id)}}" method="POST">
                                          
                                                <a class="btn btn-info" href="{{ route('pacientes.edit', $paciente->id)}}">Editar</a>
                                                 
                                                    
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
                                {!!$pacientes->links() !!}

                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
