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

        <div class="card card-teal card-default">
          <div class="card-header">
            <h3 class="card-title">Filtrar Evoluções</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-remove"></i></button>
            </div>
          </div>

          <!-- /.card-header -->
          <div class="card-body" style="display: block;">
               <!-- /.card-header -->
            <!-- form start -->
            <form role="form"  method="post" action="{{route('system.evolutions.filters')}}">
              @csrf
              <input type="hidden" id="patient_report" value="">
              <div class="card-body">
                 @include('app.evolution.index_filter_fields')
              </div>

          </div>
 
            
              <div class="card-footer" style="display: flex;">
                  <button type="submit" class="btn btn-info">Filtrar</button>
                </form>

                <form action="{{route('system.evolutions.report')}}" method="POST">
                  @csrf
                     <input type="hidden" name="report_patient_id" 
                      id="report_patient_id" value="">

                     <input type="hidden" name="report_initial_date" 
                      id="report_initial_date" value="">

                     <input type="hidden" name="report_final_date" 
                      id="report_final_date" value="">

                     <button type="submit" class="btn btn-danger ml-2">
                       <i class="fa fa-file-pdf"></i>
                       Exportar
                     </button>
                </form>
              </div>
        </div>

          @if($evolutions != '' && count($evolutions) > 0)
            @include('app.evolution.index_timeline')  
          @endif

      </section>
     
@endsection