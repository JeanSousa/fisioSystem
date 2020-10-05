
  <div class="row">
      <div class="form-group col-md-6" >
        <label>Nome</label>
        <input type="text" name="name" placeholder="Nome"
        class="form-control @error('name') is-invalid @enderror" 
        value="{{old('name')}}">
        @error('name')
        <div class="invalid-feedback">
            {{$message}}
        </div>
        @enderror
      </div>

      <div class="form-group col-md-6">
        <label>Cpf</label>
        <input type="text" name="cpf" placeholder="CPF"
        class="form-control @error('cpf') is-invalid @enderror"
        value="{{old('cpf')}}">
        @error('cpf')
        <div class="invalid-feedback">
          {{$message}}
        </div>
        @enderror
      </div>
  </div>
  
  <div class="row">
      <div class="form-group col-md-6">
        <label>Rg</label>
        <input type="text" class="form-control" name="rg" placeholder="RG">
      </div>
      <div class="form-group col-md-6">
        <label>Email</label>
        <input type="email" class="form-control" name="email" placeholder="Email">
      </div>
  </div>

  <div class="row">
      <div class="form-group col-md-6">
        <label>Foto Paciente</label>
        <input type="file" class="form-control" name="photo">
      </div>
      <div class="form-group col-md-6">
        <label>Data Nascimento</label>
        <input type="date" name="birth_date" 
        class="form-control @error('birth_date') is-invalid @enderror" 
        value="{{old('birth_date')}}" >
        @error('birth_date')
        <div class="invalid-feedback">
           {{$message}}
        </div>
        @enderror
      </div>
  </div>



