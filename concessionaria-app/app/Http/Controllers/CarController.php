<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Manufacture;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class CarController extends Controller
{
    public function index() : View{
        return view('welcome');
    }

    public function produtos() : View{
        $cars = Car::all();
        $manufactures = Manufacture::all();

        return view('produtos', [
            'cars' => $cars,
            'manufactures' => $manufactures
        ]);
    }

    public function formulario() : View{
        $manufactures = Manufacture::all();

        return view('form_veiculo', [
            'manufactures' => $manufactures
        ]);
    }

    public function store(Request $request) 
    {
        try{
            $request->validate([
                'model' => 'required|string|max:255',
                'transmission' => 'required|string|max:30',
                'color' => 'required|string|max:30',
                'description' => 'required|string|min:5|max:500',
                'fuel' => 'required|string|max:10',
                'value' => 'required|integer|min:0',
                'age' => 'required|integer|min:1900|max:2100',
                'km' => 'required|integer|min:0',
                'manufacture' => 'required|exists:manufactures,id',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);
    
            $imagePath = $request->file('image')->store('uploads', 'public');


            $airbag = $request->has('airbag') ? true : false;
            $brake = $request->has('freio') ? true : false;
            $gps = $request->has('gps') ? true : false;
            $lock = $request->has('trava') ? true : false;
            $window = $request->has('vidro') ? true : false;
            $alarm = $request->has('alarme') ? true : false;
            $air_conditioning = $request->has('ar') ? true : false;
            $sensor = $request->has('sensor') ? true : false;
            $steering = $request->has('direcao') ? true: false;
    
            $car = new Car;
            
            $car->name = $request->model;
            $car->fuel = $request->fuel;
            $car->age = $request->age;
            $car->value = $request->value;
            $car->manufacturer_id = $request->manufacture;
            $car->transmission = $request->transmission;
            $car->km = $request->km;
            $car->color = $request->color;
            $car->description = $request->description;
            $car->dir_img = $imagePath;

            $car->airbag = $airbag;
            $car->brake = $brake;
            $car->gps = $gps;
            $car->lock = $lock;
            $car->window = $window;
            $car->alarm = $alarm;
            $car->air_conditioning = $air_conditioning;
            $car->sensor = $sensor;
            $car->steering = $steering;

            
    
            $car->save();
            return redirect('/')->with('success-savecar', 'Novo veículo adicionado com sucesso');

        }catch(Exception $ex){
            return redirect('/')->with('fail-savecar', 'Não foi possível criar um novo veículo: ', $ex->getMessage());
        }
        
    }

    public function show(int $id) : View {
        try{
            $car = Car::findOrFail($id);

            
            return view('showproduto', [
                'car' => $car
            ]);
            
        }catch(ModelNotFoundException $ex){
            return redirect('/')->with('fail-searchId', 'Não foi possível encontrar o veículo');
        }
        

    }
}
