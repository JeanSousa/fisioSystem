
<section class="content">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Pacientes Cadastrados</h3>
        </div>
        <div class="card-body">
          <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4"><div class="row"><div class="col-sm-12 col-md-6"></div><div class="col-sm-12 col-md-6"></div></div><div class="row"><div class="col-sm-12"><table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
            <thead>
            <tr role="row">
              <th class="sorting_asc" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">
                Nome Paciente
              </th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending">
                Cpf
              </th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending">
                Data Nascimento
              </th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                Email
              </th>
              <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending">
                Ações
              </th>
            </tr>
            </thead>
            <tbody> 
            @foreach ($patients as $patient)
            <tr role="row" class="odd">
              <td>{{$patient->name}}</td>
              <td>{{$patient->cpf}}</td>
              <td>{{$patient->birth_date}}</td>
              <td>{{$patient->email}}</td>
              <td>
                <div class="btn-group">
                 <a href="{{route('system.patients.edit', $patient->id)}}" 
                   type="button" class="btn btn-sm btn-info">
                   <i class="fa fa-pen"></i> Editar
                 </a>
                </div>
                <div class="btn-group">
                  <form action="{{route('system.patients.destroy', $patient->id)}}"
                    method="post" >
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-sm btn-danger" >
                        <i class="fa fa-trash"></i> Excluir
                    </button>
                   </form>
                </div>
              </td>
            </tr>
            @endforeach 
            </tbody>
          
          </table>
          </div></div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
      <!-- /.card -->
    </div>
    <!-- /.col -->
  </div>
  <!-- /.row -->
</section>
