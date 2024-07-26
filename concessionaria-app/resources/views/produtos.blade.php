@extends('layouts.main')

@section('title', 'Produtos')

@section('content')

<div class="container col-md-12 mt-4">
    <div class="row">
        <div id="car-container" class="col-md-10">

            <div class="container">
                <div class="row">
                    @foreach($cars as $car)
                    <div class="col-md-3 mb-3">
                        <div class="card d-flex h-100">
                            <img src="{{asset('storage/' . $car->dir_img)}}" class="img-card" alt="{{$car->name}}">
                            <div class="card-body d-flex flex-column">

                                <h4 class="card-title flex-grow-1">{{$car->name}}</h4>
                                <h5 class="card-text bi bi-tags-fill produtos-item"> R$ {{number_format($car->value, 2, ',', '.')}}</h5>
                                <h5 class="bi bi-fuel-pump-fill mr-1 produtos-item"> {{$car->fuel}}</h5>
                                <h5 class="bi bi-calendar-date-fill produtos-item"> {{$car->age}}</h5>
                                <a href="{{url('/produtos/'.$car->id)}}" class="btn btn-primary btn-explorar mt-1 bi bi-search"> Explorar veiculo</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>


        </div>

        <div class="col-md-2">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">Fabricantes</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($manufactures as $manufacture)
                    <tr>
                        <td>{{$manufacture->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection