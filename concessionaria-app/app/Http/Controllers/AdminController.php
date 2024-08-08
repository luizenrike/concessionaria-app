<?php

namespace App\Http\Controllers;
use App\Models\Car;
use App\Models\User;
use App\Models\Manufacture;
use App\Models\Util;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //getVeiculos
    public function getVeiculos() : View{
        $cars = Car::all();
        return View('dashboard_admin.veiculos_listar', [
            'cars' => $cars
        ]);
    }

    public function administracao(): View
    {
        $carCount = Car::count();
        $manufactureCount = Manufacture::count();
        $visits = Util::find(1)->visits;

        return view('dashboard_admin.home_dashboard', [
            'carCount' => $carCount,
            'manufactureCount' => $manufactureCount,
            'visits' => $visits
        ]);
    }

    public function anuncie() : View{
        return view('anuncie');
    }
}
