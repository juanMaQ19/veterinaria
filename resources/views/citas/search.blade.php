@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="section-header">
            <h3 class="page__heading">Búsqueda de Pacientes</h3>
        </div>

        <div class="section-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <h5>Resultados de la búsqueda:</h5>
                            @if($pacientes->isEmpty())
                                <p>No se encontraron pacientes.</p>
                            @else
                                <select name="paciente" id="paciente" class="selectpicker" data-style="btn-primary">
                                    @foreach($pacientes as $paciente)
                                        <option value="{{ $paciente->id }}">{{ $paciente->nombre }}</option>
                                    @endforeach
                                </select>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
