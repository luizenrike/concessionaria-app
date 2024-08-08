<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsuarios(){
        $users = User::select('id', 'name', 'email', 'role')->get();

        return view('dashboard_admin.users_listar', [
            'users' => $users
        ]);
    }
}
