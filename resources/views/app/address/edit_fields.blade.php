
<div class="row">
  <div class="form-group col-md-6" >
    <label>Cep</label>
    <input type="text" name="cep" class="form-control"
    placeholder="Cep" value="{{$patient->cep}}">
  </div>
  <div class="form-group col-md-6" >
    <label>Rua</label>
    <input type="text" name="street" class="form-control"
    placeholder="Rua" value="{{$patient->street}}">
  </div>
</div>

<div class="row">
  <div class="form-group col-md-6" >
    <label>Numero</label>
    <input type="text" name="number" class="form-control"
    placeholder="Numero" value="{{$patient->number}}">
  </div>
  <div class="form-group col-md-6" >
    <label>Bairro</label>
    <input type="text" name="neighborhood" class="form-control"
    placeholder="Bairro" value="{{$patient->neighborhood}}">
  </div>
</div>

<div class="row">
  <div class="form-group col-md-6" >
    <label>Cidade</label>
    <input type="text" name="city" class="form-control"
    placeholder="Cidade" value="{{$patient->city}}">
  </div>
  <div class="form-group col-md-6" >
    <label>Estado</label>
    <input type="text" name="state" class="form-control"
    placeholder="Estado" value="{{$patient->state}}">
  </div>
</div>

