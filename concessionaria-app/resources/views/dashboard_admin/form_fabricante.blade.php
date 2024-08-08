@extends('dashboard_admin.layouts.dashboard')


@section('content')
@if($errors->any())
<div class="alert alert-danger w-50">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="container mt-5">

    <form id="form-veiculo" action="/dashboard/administracao/fabricantes/novo/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="d-flex justify-content-center">
            <div class="col-md-4"> <!-- Ajuste a largura do input aqui -->
                <div class="form-group mt-3">
                    <label for="name">Nome do fabricante</label><br>
                    <input id="name" name="name" type="text" class="form-control" placeholder="General Motors" required>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <button id="button-criar" type="submit" class="btn btn-primary w-25">Adicionar Fabricante</button>
        </div>
    </form>
</div>

@endsection