@extends('layouts.admin')

@section('content')
      <!-- Content Header (Page header) -->
      <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0 text-dark">Evolução Diária</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Pacientes</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
      <section class="content">
        <div class="card card-teal">
            <div class="card-header">
              <h3 class="card-title">Filtrar Evoluções</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form role="form"  method="post" action="{{route('system.evolutions.filters')}}">
              @csrf
              <div class="card-body">
                 @include('app.evolution.index_filter_fields')
 
              </div>
              <!-- /.card-body -->

              <div class="card-footer">
                <button type="submit" class="btn btn-info">Filtrar</button>
              </div>
            </form>
          </div>

          @if($evolutions != '')
            @include('app.evolution.index_timeline')  
          @endif

      </section>
     
@endsection