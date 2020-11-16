<div class="row">
    <div class="form-group col-md-6">
        <label>Paciente</label>   
        <select name="patient" class="form-control" >
        @foreach ($patients as $patient)
        <option value="{{$patient->id}}">{{ucwords($patient->name)}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group col-md-6">
        <label>SatO<sub>2</sub> (saturação oxigênio)</label>
        <input type="text" name="satO2" 
        class="form-control">
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
      <label>PAI (pressão arterial inicial)</label>
      <input type="text" name="paIni" 
      class="form-control">
    </div>

    <div class="form-group col-md-6">
        <label>PAF (pressão arterial final)</label>
        <input type="text" name="paFim" 
        class="form-control">
    </div>
</div>