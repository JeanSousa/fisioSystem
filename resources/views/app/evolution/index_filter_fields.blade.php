<div class="row">
    <div class="form-group col-md-6">
        <label>Paciente</label>   
        <select name="patient_id" id="patient_id" class="form-control" >
        @foreach ($patients as $patient)
        <option value="{{$patient->id}}">{{ucwords($patient->name)}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group col-md-3">
        <label>Data Inicial</label>   
        <input type="date" name="initial_date" 
        id="initial_date" class="form-control">
    </div>

    <div class="form-group col-md-3">
        <label>Data Final</label>   
        <input type="date" name="final_date" 
        id="final_date" class="form-control">
    </div>
</div>

