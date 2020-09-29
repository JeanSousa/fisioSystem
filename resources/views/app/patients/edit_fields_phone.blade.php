
  <div class="row">

    <div class="form-group col-md-6">
      <label>Celular</label>
      <input type="text" name="mobile_phone" placeholder="celular"
      class="form-control @error('mobile_phone') is-invalid @enderror"
      value="{{$patient->mobile_phone}}">
      @error('mobile_phone')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="form-group col-md-6" >
        <label>Telefone</label>
        <input type="text" name="phone" placeholder="Telefone"
        class="form-control @error('phone') is-invalid @enderror" 
        value="{{$patient->phone}}">
        @error('phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

  </div>
 