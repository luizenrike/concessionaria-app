@extends('layouts.main')

@section('title', $car->name)

@section('content')

<div class="container col-md-12">
    <h2 class="title-show text-upper">Veículo {{$car->name}} Ano {{$car->age}}</h2>
    <div class="row">
        <div class="col-md-6">
            <img src="{{asset('storage/'.$car->dir_img)}}" alt="{{$car->name}}" class="img-show">

            <div class="floating-container-show-itens">
                <h5>Descrição:</h5>
                <p>{{$car->description}}</p>
            </div>

            <div name="itens" class="floating-container-show-itens">
                <div class="row">
                    <ul class="horizontal-list">
                        @foreach($car->items as $item)
                        <li><ion-icon class="bi bi-bag-check-fill show-itens"></ion-icon> {{$item}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-5 mr-3">

            <div class="container-fluid floating-container">
                <h4 class="text-upper"> {{$car->name}}</h4>
                <h4 class="bi bi-calendar-date-fill mb-3"> {{$car->age}}</h4>
                <h4 class="bi bi-fuel-pump-fill mb-3"> {{$car->fuel}}</h4>
                <h4 class="bi bi-tags-fill mb-3 price-color"> R$ {{number_format($car->value, 2, ',', '.')}}</h4>
            </div>

            <div class="container-fluid floating-container mt-3">
                <div class="row ">
                    <div class="col-12">
                        <h5 class="title-show-item">Câmbio</h5>
                        <p>{{$car->transmission}}</p>
                    </div>
                </div>
                <div class="row ">
                    <div class="col-12">
                        <h5 class="title-show-item">Quilômetros</h5>
                        <p>{{number_format($car->km, 0, ' ', '.')}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <h5 class="title-show-item">Cor</h5>
                        <p>{{$car->color}}</p>
                    </div>
                </div>
            </div>

            <div class="floating-container contact mt-3">
                <h5 class="text-convite">Negocie nossas ofertas, fale com um vendedor</h5>
                <a href="https://wa.me/5511999999999?text=Olá,%20gostaria%20de%20mais%20informações" class="whatsapp-button" target="_blank">
                    <i class="fab fa-whatsapp"></i>
                    Fale agora mesmo com um vendedor
                </a>
            </div>
        </div>
    </div>
</div>


@endsection