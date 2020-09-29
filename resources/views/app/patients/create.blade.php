@extends('layouts.admin')

@section('content')
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Cadastro de Pacientes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{route('system.patients.index')}}">Listar Pacientes</a></li>
                <li class="breadcrumb-item active">Cadastro de pacientes</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      {{-- <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-teal">
              <div class="card-header">
                <h3 class="card-title">Cadastro de pacientes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form role="form" method="post" action="{{route('system.patients.store')}}"
            enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                 @include('app.patients.create_fields')
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Salvar</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div> --}}

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
      <div class="card card-teal card-tabs">
        <div class="card-header p-0 pt-1">
          <ul class="nav nav-tabs" id="custom-tabs-one-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active" id="custom-tabs-one-home-tab" data-toggle="pill" href="#custom-tabs-one-home" role="tab" aria-controls="custom-tabs-one-home" aria-selected="true">Dados Pessoais</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="custom-tabs-one-profile-tab" data-toggle="pill" href="#custom-tabs-one-profile" role="tab" aria-controls="custom-tabs-one-profile" aria-selected="false">Telefones</a>
            </li>
          </ul>
        </div>
        <div class="card-body">
          <form role="form" method="post" id="patient" action="{{route('system.patients.store')}}"
          enctype="multipart/form-data">
          <div class="tab-content" id="custom-tabs-one-tabContent">
                @csrf
            <div class="tab-pane fade active show" id="custom-tabs-one-home" role="tabpanel" aria-labelledby="custom-tabs-one-home-tab">
                   @include('app.patients.create_fields')
            </div>

            <div class="tab-pane fade" id="custom-tabs-one-profile" role="tabpanel" aria-labelledby="custom-tabs-one-profile-tab">
                @include('app.patients.create_fields_phone')
            </div>

          </div>
        </form>
        </div>
          <div class="card-footer">
            <button type="submit" class="btn btn-info" id="submit">Salvar</button>
          </div>
        </div>
          </div>
        </div>
      </div>
      
      <script>
        document.getElementById("submit").addEventListener("click", submitForm);
      
        function submitForm() {
          document.getElementById("patient").submit();
        }
      </script>
     
@endsection





