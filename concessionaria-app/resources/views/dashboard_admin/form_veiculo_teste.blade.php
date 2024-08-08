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
    
    <form id="form-veiculo" action="/dashboard/administracao/veiculos/novo/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-6">
                <div class="form-group mt-3">
                    <label for="model">Modelo</label>
                    <input id="model" name="model" type="text" class="form-control" placeholder="Ford Ranger" required>
                </div>

                <div class="form-group mt-3">
                    <label for="fuel">Combustível</label>
                    <input id="fuel" name="fuel" type="text" maxlength="10" class="form-control" placeholder="Diesel" required>
                </div>

                <div class="form-group mt-3">
                    <label for="age">Ano</label>
                    <input id="age" name="age" type="number" class="form-control" placeholder="2022" required>
                </div>

                <div class="form-group mt-3">
                    <label for="value">Preço</label>
                    <input id="value" name="value" type="number" class="form-control" placeholder="0.00" step="0.01" min="0" required>
                </div>

                <div class="form-group mt-3">
                    <label for="color">Cor</label>
                    <input id="color" name="color" type="text" maxlength="30" class="form-control" placeholder="Branco" required>
                </div>

                <div class="form-group mt-3">
                    <label for="transmission">Câmbio</label>
                    <select id="transmission" name="transmission" class="form-select" required>
                        <option value="" selected disabled hidden>Escolha o tipo de câmbio</option>
                        <option value="Manual">Manual</option>
                        <option value="Automático">Automático</option>
                    </select>
                </div>

                <div class="form-group mt-3">
                    <label for="manufacture">Fabricante</label>
                    <select id="manufacture" name="manufacture" class="form-select" required>
                        <option value="" selected disabled hidden>Escolha a fabricante</option>
                        @foreach($manufactures as $manufacture)
                        <option value="{{$manufacture->id}}">{{$manufacture->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row mt-3">

                    <div class="col-md-3">
                        <div class="form-check">
                            <label for="airbag" class="p-1 form-check-label">Airbag</label>
                            <input type="checkbox" name="items[]" value="Airbag" class="form-check-input">
                        </div>
                        <div class="form-check">
                            <label for="freio" class="p-1 form-check-label">Freio ABS</label>
                            <input type="checkbox" name="items[]" value="Freio ABS" class="form-check-input">
                        </div>
                        <div class="form-check">
                            <label for="gps" class="p-1 form-check-label">GPS</label>
                            <input type="checkbox" name="items[]" value="GPS" class="form-check-input">
                        </div>

                    </div>

                    <div class="col-md-3">
                        <div class="form-check">
                            <label for="trava" class="p-1 form-check-label">Trava Elétrica</label>
                            <input type="checkbox" name="items[]" value="Trava Eletrica" class="form-check-input">
                        </div>
                        <div class="form-check">
                            <label for="vidro" class="p-1 form-check-label">Vidros Elétricos</label>
                            <input type="checkbox" name="items[]" value="Vidros Eletricos" class="form-check-input">
                        </div>
                        <div class="form-check">
                            <label for="alarme" class="p-1 form-check-label">Alarme</label>
                            <input type="checkbox" name="items[]" value="Alarme" class="form-check-input">
                        </div>

                    </div>
                    <div class="col-md-4">
                        <div class="form-check">
                            <label for="ar" class="p-1 form-check-label">Ar-Condicionado</label>
                            <input type="checkbox" name="items[]" value="Ar-Condicionado" class="form-check-input">
                        </div>

                        <div class="form-check">
                            <label for="sensor" class="p-1 form-check-label">Sensor de estacionamento</label>
                            <input type="checkbox" name="items[]" value="Sensor de estacionamento" class="form-check-input">
                        </div>

                        <div class="form-check">
                            <label for="direcao" class="p-1 form-check-label">Direcao Hidráulica</label>
                            <input type="checkbox" name="items[]" value="Direcao Hidraulica" class="form-check-input">
                        </div>

                    </div>



                </div>


            </div>

            <div class="col-md-6 mt-3">
                <div class="form-group">
                    <label for="img-upload"> </label>
                    <img id="img-preview" src="/storage/img/store_car3.png" class="img-store mb-3" width="500" alt="car png">
                    <input id="img-upload" name="image" class="form-control-file" type="file" accept="image/*" required onchange="previewImage(event)">
                </div>


                <div class="form-group mt-3">
                    <label for="km">Quilômetros</label>
                    <input type="number" min="0" name="km" class="form-control" placeholder="0.00" step="0.01" required>
                </div>

                <div class="form-group">
                    <label for="description">Descrição:</label>
                    <textarea class="form-control" id="description" name="description" rows="4" cols="50" min="5" max="500" required></textarea>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-3">
            <button id="button-criar" type="submit" class="btn btn-primary w-25">Adicionar veículo</button>
        </div>
    </form>
</div>

@endsection