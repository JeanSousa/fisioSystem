<div class="row">
    <div class="form-group col-md-6">
        <label>Paciente</label>   
        <select name="patient_id" class="form-control" >
        @foreach ($patients as $patient)
        <option value="{{$patient->id}}">{{ucwords($patient->name)}}</option>
        @endforeach
        </select>
    </div>

    <div class="form-group col-md-6">
        <label>Data</label>   
        <input type="date" name="evolution_date" 
        class="form-control
        @error('evolution_date') is-invalid  @enderror"
        value="{{old('evolution_date')}}">
        @error('evolution_date')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
      <label>PAI (pressão arterial inicial)</label>
      <input type="text" name="initial_blood_pressure" 
      class="form-control 
      @error('initial_blood_pressure') is-invalid  @enderror"
      value="{{old('initial_blood_pressure')}}">
      @error('initial_blood_pressure')
      <div class="invalid-feedback">
          {{$message}}
      </div>
      @enderror
    </div>

    <div class="form-group col-md-6">
      <label>PAF (pressão arterial final)</label>
      <input type="text" name="final_blood_pressure" 
      class="form-control
      @error('final_blood_pressure') is-invalid  @enderror"
      value="{{old('final_blood_pressure')}}" >
      @error('final_blood_pressure')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
      <label>SatO<sub>2</sub> (saturação oxigênio)</label>
      <input type="text" name="o2_saturation" 
      class="form-control
      @error('o2_saturation') is-invalid  @enderror"
      value="{{old('o2_saturation')}}">
      @error('o2_saturation')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>
</div>

<div class="row">
    <div class="form-group col-md-12">
        <label>Observações do atendimento</label>
        <textarea name="observation" 
        class="form-control
        @error('observation') is-invalid  @enderror">
        </textarea>
        @error('observation')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
    </div>
</div>