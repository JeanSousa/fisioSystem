<div class="row col-md-6 text-center"> 
    @if($patient->photo)
    <img class="profile-user-img img-fluid img-circle"
     src="{{asset('storage/' . $patient->photo)}}"
         alt="Foto Paciente">      
    @else
    <img class="profile-user-img img-fluid img-circle"
     src="{{asset('storage/patients/notPicture.png')}}"
         alt="Foto Paciente">       
    @endif
</div>

<div class="row">
    <div class="form-group col-md-6" >
      <label>Nome</label>
    <input type="text" class="form-control" name="name" 
     value="{{$patient->name}}"  placeholder="Nome">
    </div>
    <div class="form-group col-md-6">
      <label>Cpf</label>
    <input type="text" class="form-control" name="cpf" 
     value="{{$patient->cpf}}" placeholder="CPF">
    </div>
</div>

<div class="row">
    <div class="form-group col-md-6">
      <label>Rg</label>
    <input type="text" class="form-control" name="rg" 
     value="{{$patient->rg}}" placeholder="RG">
    </div>
    <div class="form-group col-md-6">
      <label>Email</label>
    <input type="email" class="form-control" name="email"
     value="{{$patient->email}}" placeholder="Email">
    </div>
</div>

<div class="row">
  <div class="form-group col-md-6">
    <label>Foto Paciente</label>
  <input type="file" class="form-control" value="{{$patient->photo}}" name="photo">
  </div>
    <div class="form-group col-md-6">
      <label>Data Nascimento</label>
      <input type="date" name="birth_date"
      value="{{$patient->birth_date}}" class="form-control">
    </div>
</div>
