@extends('layouts.app')

@section('css')
<link rel="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" href="style.css">
<link rel="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css" href="style.css">
@endsection

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Usuarios</h3>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <a class="btn btn-warning" href="{{route('usuarios.create')}}">Nuevo usuario</a>
                                     
                            <table id="usuario" class="table table-striped mt-2">
                                <thead style="background-color:#6777ef">
                                    <th style="display :none;">ID</th>
                                    <th style="color:#fff">Nombre </th>
                                    <th style="color:#fff;">E-mail</th>
                                    <th style="color:#fff;">Rol</th>
                                    <th style="color:#fff;">Acciones</th>


                                </thead>
                            
                                <tbody>
                                    @foreach($usuarios as $usuario)
                                    <tr>
                                        <td style="display: none;">{{$usuario->id}}</td>
                                        <td>{{$usuario->name}}</td>
                                        <td>{{$usuario->email}}</td>
                                        <td>
                                            @if(!empty($usuario->getRoleNames()))
                                            @foreach($usuario->getRoleNames() as $rolName)
                                            <h5><span class="badge badge-dark">{{$rolName}}</span></h5>
                                            @endforeach
                                            @endif
                                        </td>
                                        <td>
                                           
                                            <a class="btn btn-info" href="{{ route('usuarios.edit', $usuario->id)}}">Editar</a>
                                            
                                        

                                            {!!Form::open(['method'=> 'DELETE', 'route'=>['usuarios.destroy',$usuario->id],'style'=>'display:inline']) !!}


                                            {!! Form::submit('Eliminar', ['class'=>'btn btn-danger']) !!}

                                            {!!Form::close() !!}
                                           
                                        </td>
                                        

                                    </tr>
                                    @endforeach 

                                </tbody>
                            </table>
                            <div class="pagination justify-content-end">
                                {!! $usuarios->links() !!}

                            </div>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<script>
 $(document).ready(function(){
    $('#usuario').DataTable();
 });
</script>
@endsection

@endsection
