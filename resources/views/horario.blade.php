@extends('layouts.app')

@section('content')
    <form action="{{ url('/horario') }}" method="POST">
        @csrf
        <section class="section">
            <div class="section-header">
                <h3 class="page__heading">Gestionar horario</h3>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="medico">Seleccionar medico</label>
                                    <select name="medico" id="medico" class="form-control">
                                        @foreach ($medicos as $medico)
                                            <option value="{{ $medico->id }}">{{ $medico->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button class="btn btn-warning" type="submit">Guardar cambios</button>
                                <div class="card-body">
                                    @if (session('notification'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('notification') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger" role="alert">
                                            Los cambios se guardaron, pero se encontró lo siguiente:
                                            <ul>
                                                @foreach (session('error') as $error)
                                                    <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                                <div class="table-responsive-sm">
                                    <table class="table table-striped mt-2">
                                        <thead style="background-color:#6777ef">
                                            <th style="color:#fff">Día</th>
                                            <th style="color:#fff">Activo</th>
                                            <th style="color:#fff">Turno mañana</th>
                                            <th style="color:#fff">Turno tarde</th>
                                        </thead>
                                        <tbody>
                                            @foreach ($horarios as $key => $horario)
                                                <tr>
                                                    <th>{{ $days[$key] }}</th>
                                                    <td>
                                                        <label class="custom-toggle">
                                                            <input type="checkbox" name="active[]"
                                                                value="{{ $key }}"
                                                                {{ $horario->active ? 'checked' : '' }}>
                                                            <span class="custom-toggle-slider rounded-circle"></span>
                                                        </label>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col">
                                                                <select class="form-control"
                                                                    name="morning_start[]">
                                                                    @for ($i = 8; $i <= 11; $i++)
                                                                        <option value="{{ ($i < 10 ? '0' : '') . $i }}:00"
                                                                            {{ $i . ':00 AM' == $horario->morning_start ? 'selected' : '' }}>
                                                                            {{ $i }}:00 AM</option>
                                                                        <option value="{{ ($i < 10 ? '0' : '') . $i }}:30"
                                                                            {{ $i . ':30 AM' == $horario->morning_start ? 'selected' : '' }}>
                                                                            {{ $i }}:30 AM</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <select class="form-control" name="morning_end[]">
                                                                    @for ($i = 8; $i <= 11; $i++)
                                                                        <option value="{{ ($i < 10 ? '0' : '') . $i }}:00"
                                                                            {{ $i . ':00 AM' == $horario->morning_end ? 'selected' : '' }}>
                                                                            {{ $i }}:00 AM</option>
                                                                        <option value="{{ ($i < 10 ? '0' : '') . $i }}:30"
                                                                            {{ $i . ':30 AM' == $horario->morning_end ? 'selected' : '' }}>
                                                                            {{ $i }}:30 AM</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="row">
                                                            <div class="col">
                                                                <select class="form-control"
                                                                    name="afternoon_start[]">
                                                                    @for ($i = 2; $i <= 11; $i++)
                                                                        <option value="{{ $i + 12 }}:00"
                                                                            {{ $i . ':00 PM' == $horario->afternoon_start ? 'selected' : '' }}>
                                                                            {{ $i }}:00 PM</option>
                                                                        <option value="{{ $i + 12 }}:30"
                                                                            {{ $i . ':30 PM' == $horario->afternoon_start ? 'selected' : '' }}>
                                                                            {{ $i }}:30 PM</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <div class="col">
                                                                <select class="form-control"
                                                                    name="afternoon_end[]">
                                                                    @for ($i = 2; $i <= 11; $i++)
                                                                        <option value="{{ $i + 12 }}:00"
                                                                            {{ $i . ':00 PM' == $horario->afternoon_end ? 'selected' : '' }}>
                                                                            {{ $i }}:00 PM</option>
                                                                        <option value="{{ $i + 12 }}:30"
                                                                            {{ $i . ':30 PM' == $horario->afternoon_end ? 'selected' : '' }}>
                                                                            {{ $i }}:30 PM</option>
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>
@endsection
