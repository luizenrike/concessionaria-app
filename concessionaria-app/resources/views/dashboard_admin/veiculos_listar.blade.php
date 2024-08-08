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
    <h5 class="card-title">Veiculos na loja</h5>
    <hr>
    <div class="mb-3">
      <a href="{{url('/dashboard/administracao/veiculos/novo')}}" class="btn btn-primary button-cadastrar-position">Adicionar Veículo</a>
    </div>
  </div>




  <div class="card-body dashboard-table">

    <div class="table-responsive">

      <table class="table">
        <thead>
          <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Fabricante</th>
            <th scope="col">Transmissão</th>
            <th scope="col">Combustível</th>
            <th scope="col">Ação</th>
          </tr>
        </thead>
        <tbody>
          @foreach($cars as $car)
          <tr>
            <th scope="row">{{$car->id}}</th>
            <td><a href="{{url('/produtos/'.$car->id)}}">{{$car->name}}</a></td>
            <td>{{$car->manufacturer_id}}</td>
            <td>{{$car->transmission}}</td>
            <td>{{$car->fuel}}</td>
            <td>
              <div class="action-itens">
                <a href="/dashboard/administracao/veiculos/editar/{{$car->id}}" class="fa-sharp fa-solid fa-pen icon-space edit-pen-color" title="Editar"></a>
                <form id="delete-form-{{$car->id}}" action="/dashboard/administracao/veiculos/deletar/{{$car->id}}" method="POST">
                  @csrf
                  @method('DELETE')
                  <a class="fa-solid fa-trash icon trash-color" title="Excluir" onclick="confirmDelete('{{$car->id}}')"></a>
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