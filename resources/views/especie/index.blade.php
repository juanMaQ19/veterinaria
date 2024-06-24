@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Especies</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{route('especie.create')}}">Agregar especie</a>
                            <div class="card-body">
                                @if(session('notificacion'))
                                <div class="alert alert-success" role="alert">
                                    {{session('notificacion')}}
                                </div>
                                @endif


                            </div>
                            <div class="table-responsive-sm">
                            <table class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display :none;">ID</th>
                                    <th style="color:#fff">Nombre </th>

                                    <th style="color:#fff;">Acciones</th>


                                </thead>
                            
                                <tbody>
                                    @foreach($especies as $especie)
                                    <tr>
                                        <td style="display: none;">{{$especie->id}}</td>
                                        <td>{{$especie->nombre}}</td>
                                        
                                        
                                        
                                        <td>
                                            <form action="{{route('especie.destroy',$especie->id)}}" method="POST">
                                          
                                                <a class="btn btn-info" href="{{ route('especie.edit', $especie->id)}}">Editar</a>
                                                 
                                                    
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
                                {!!$especies->links() !!}

                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
