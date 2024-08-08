<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Manufacture;
use App\Models\Util;
use Exception;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;

class CarController extends Controller
{

    public function index(): View
    {
        $util = Util::find(1);
        $util->visits++;
        $util->save();

        return view('welcome');
    }

    public function produtos(): View
    {
        $cars = Car::all();
        $manufactures = Manufacture::all();

        return view('produtos', [
            'cars' => $cars,
            'manufactures' => $manufactures,
            'search' => ''
        ]);
    }

    public function search(): View
    {
        $searchFiltered = request('search');
        $cars = Car::where('name', 'LIKE', '%' . $searchFiltered . '%')->get();

        $manufactures = Manufacture::all();

        return view('produtos', [
            'cars' => $cars,
            'manufactures' => $manufactures,
            'search' => $searchFiltered
        ]);
    }

    public function formularioEditar(int $id): View
    {
        $manufactures = Manufacture::all();
        $car = Car::findOrFail($id);

        return view('dashboard_admin.form_veiculo_editar', [
            'manufactures' => $manufactures,
            'car' => $car
        ]);
    }

    public function formulario(): View
    {
        $manufactures = Manufacture::all();

        return view('dashboard_admin.form_veiculo_teste', [
            'manufactures' => $manufactures
        ]);
    }

    public function store(Request $request)
    {
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
        try {

            $imagePath = $request->file('image')->store('uploads', 'public');
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
            $car->items = $request->items;

            $car->save();


            return redirect('/dashboard/administracao/veiculos')->with('success', 'Novo veículo adicionado com sucesso');
        } catch (Exception $ex) {
            return redirect('/dashboard/administracao/veiculos')->with('fail', 'Não foi possível criar um novo veículo: '.$ex->getMessage());
        }
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'model' => 'required|string|max:255',
            'transmission' => 'required|string|max:30',
            'color' => 'required|string|max:30',
            'description' => 'required|string|min:5|max:500',
            'fuel' => 'required|string|max:10',
            'value' => 'required|integer|min:0',
            'age' => 'required|integer|min:1900|max:2100',
            'km' => 'required|integer|min:0',
            'manufacture' => 'required|exists:manufactures,id',
            
        ]);

        try {
            $car = Car::find($id);

            if (!$car) {
                return redirect('/dashboard/administracao/veiculos')->with('fail', 'Carro não encontrado');
            }

            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('uploads', 'public');
                $car->dir_img = $imagePath;
            }else{
                $car->dir_img = $request->existing_image;
            }

            $car->name = $request->model;
            $car->fuel = $request->fuel;
            $car->age = $request->age;
            $car->value = $request->value;
            $car->manufacturer_id = $request->manufacture;
            $car->transmission = $request->transmission;
            $car->km = $request->km;
            $car->color = $request->color;
            $car->description = $request->description;
            $car->items = $request->items;

            $car->save();

            return redirect('/dashboard/administracao/veiculos')->with('success', 'Veículo atualizado com sucesso');
        } catch (\Exception $ex) {
            return redirect('/dashboard/administracao/veiculos')->with('fail', 'Não foi possível atualizar o veículo: ' . $ex->getMessage());
        }
    }

    public function destroy(int $id){
        try{
        Car::findOrFail($id)->delete();
        return redirect('/dashboard/administracao/veiculos')->with('delete', 'Veículo com id '.$id.' foi deletado');

        }catch(\Exception $ex) 
        {
            return redirect('/dashboard/administracao/veiculos')->with('fail', 'Não foi possível deletar o veículo: '. $ex->getMessage());
        }

    }

    public function show(int $id): View
    {
        try {
            $car = Car::findOrFail($id);


            return view('showproduto', [
                'car' => $car
            ]);
        } catch (ModelNotFoundException $ex) {
            return redirect('/')->with('fail-searchId', 'Não foi possível encontrar o veículo');
        }
    }

}
