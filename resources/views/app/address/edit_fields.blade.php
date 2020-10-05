
<div class="row">
  <div class="form-group col-md-6" >
    <label>Cep</label>
    <input type="text" name="cep" id="cep" class="form-control cep"
    placeholder="Cep" value="{{$patient->cep}}">
  </div>
  <div class="form-group col-md-6" >
    <label>Rua</label>
    <input type="text" name="street" class="form-control street"
    placeholder="Rua" value="{{$patient->street}}">
  </div>
</div>

<div class="row">
  <div class="form-group col-md-6" >
    <label>Numero</label>
    <input type="text" name="number" class="form-control number"
    placeholder="Numero" value="{{$patient->number}}">
  </div>
  <div class="form-group col-md-6" >
    <label>Bairro</label>
    <input type="text" name="neighborhood" class="form-control neighborhood"
    placeholder="Bairro" value="{{$patient->neighborhood}}">
  </div>
</div>

<div class="row">
  <div class="form-group col-md-6" >
    <label>Cidade</label>
    <input type="text" name="city" class="form-control city"
    placeholder="Cidade" value="{{$patient->city}}">
  </div>
  <div class="form-group col-md-6" >
    <label>Estado</label>
    <input type="text" name="state" class="form-control state"
    placeholder="Estado" value="{{$patient->state}}">
  </div>
</div>

