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
        <h5 class="card-title">Dashboard</h5>
    </div>

    

    <div class="card-body text-justify">

    <img src="/storage/img/dashboard_img.png" alt="banner com itens de configuração">
        <div class="row mt-5">
            <div class="col-md-6">
               
                <h4 class="text-justify">Bem vindo ao paínel administrativo, aqui você poderá manipular diversos dados do site principal, veja algumas das nossas funcionalidades: </h4>

                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Criação de um novo veículo</li>
                    <li class="list-group-item">Edição e deleção de um veículo</li>
                    <li class="list-group-item">Criação de novos fabricantes</li>
                    <li class="list-group-item">Edição e deleção de fabricantes</li>
                    <li class="list-group-item">Administração de usuários</li>
                </ul>
            </div>

            <div class="col-md-6">
                <h4 class="text-justify">Veja nossas principais estatísticas:</h4>
                <ul class="list-group">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Visitas ao site KeyVehicles
                        <span>{{$visits}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Carros disponíveis na loja 
                        <span>{{$carCount}}</span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Fabricantes cadastrados
                        <span>{{$manufactureCount}}</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection