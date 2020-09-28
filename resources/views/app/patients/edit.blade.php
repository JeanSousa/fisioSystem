@extends('layouts.admin')

@section('content')
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Pacientes</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('system.patients.index')}}">Listar Pacientes</a></li>
                <li class="breadcrumb-item active">Editar Paciente</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->

      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-teal">
              <div class="card-header">
                <h3 class="card-title">Edição de pacientes</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
            <form role="form" method="post" 
              action="{{route('system.patients.update', $patient->id)}}"
              enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                 @include('app.patients.edit_fields')
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <button type="submit" class="btn btn-info">Salvar</button>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div>

@endsection
