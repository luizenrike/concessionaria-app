@extends('dashboard_admin.layouts.dashboard')


@section('content')
@if(session('success'))
<div class="alert alert-success w-50" role="alert">{{session('success')}}</div>
@endif

@if(session('fail'))
<div class="alert alert-warning w-50" role="alert">{{session('fail')}}</div>
@endif

@if(session('delete'))
<div class="alert alert-danger w-50" role="alert">{{session('delete')}}</div>
@endif

<div class="card border-0 shadow-sm">
  <div class="card-header bg-white border-0">
    <h5 class="card-title">Fabricantes</h5>
    <hr>
  </div>
  <div class="mb-3">
    <a href="{{url('/dashboard/administracao/fabricantes/novo')}}" class="btn btn-primary button-cadastrar-position">Adicionar Fabricante</a>
  </div>



  <div class="card-body dashboard-table">

    <div class="table-responsive">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Quantidade de Carros</th>
            <th scope="col">Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach($manufactures as $manufacture)
          <tr>
            <th scope="row">{{$manufacture->id}}</th>
            <td>{{$manufacture->name}}</td>
            <td>{{$manufacture->qtdCarros}}</td>
            <td >
              <div class="action-itens">
                <a href="{{url('/dashboard/administracao/fabricantes/editar/'.$manufacture->id)}}" class="fa-sharp fa-solid fa-pen icon-space edit-pen-color" title="Editar"></a>
                <form id="delete-form-{{$manufacture->id}}" action="/dashboard/administracao/fabricantes/deletar/{{$manufacture->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a class="fa-solid fa-trash icon trash-color" title="Excluir" onclick="confirmDelete('{{$manufacture->id}}')"></a>
                </form>
              </div>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection