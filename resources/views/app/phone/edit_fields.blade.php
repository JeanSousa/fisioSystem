
  <div class="row">

    <div class="form-group col-md-6">
      <label>Celular</label>
      <input type="text" name="mobile_phone" placeholder="celular"
      class="form-control mobile_phone @error('mobile_phone') is-invalid @enderror"
      value="{{$patient->phone[0]->mobile_phone}}">
      @error('mobile_phone')
      <div class="invalid-feedback">
        {{$message}}
      </div>
      @enderror
    </div>

    <div class="form-group col-md-6" >
        <label>Telefone</label>
        <input type="text" name="phone" placeholder="Telefone"
        class="form-control phone @error('phone') is-invalid @enderror" 
        value="{{$patient->phone[0]->phone}}">
        @error('phone')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
    </div>

  </div>
 