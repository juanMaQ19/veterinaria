@if($pacientes->count() > 0)
    <div class="form-group">
        <label for="pacientes">Paciente</label>
        <select name="pacientes[]" id="pacientes" class="form-control selectpicker"
                data-style="btn-primary" title="Seleccionar al paciente" required>
            @foreach($pacientes as $paciente)
                <option value="{{$paciente->id}}">{{$paciente->nombre}}</option>
            @endforeach
        </select>
    </div>
@else
    <p>No se encontraron pacientes para el propietario.</p>
@endif
