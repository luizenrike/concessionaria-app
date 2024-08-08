<?php

namespace App\Http\Controllers;

use App\Models\Manufacture;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    public function getFabricantes(): View
    {
        $manufactures = Manufacture::all();

        $manufacturesDTO = [];
        foreach($manufactures as $manufacture){
            $dto = new \stdClass;
            $dto->id = $manufacture->id;
            $dto->name = $manufacture->name;
            $dto->qtdCarros = $manufacture->cars()->count();

            $manufacturesDTO[] = $dto;
        }
        

        return view('dashboard_admin.fabricantes_listar', [
            'manufactures' => $manufacturesDTO
        ]);
    }


    public function formulario()
    {
        return view('dashboard_admin.form_fabricante');
    }

    public function formularioEdit(int $id){
        $manufacture = Manufacture::find($id);

        return view('dashboard_admin.form_fabricante_editar', [
            'manufacture' => $manufacture
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255'
        ]);

        try {
            $exist = Manufacture::whereRaw('LOWER(name) = ?', [strtolower($request->name)])->first();
            if($exist)
                return redirect('/dashboard/administracao/fabricantes')->with('fail', 'Já existe um fabricante com o nome: '.$request->name);

            $manufacture = new Manufacture();
            $manufacture->name = $request->name;
            $manufacture->save();
            return redirect('/dashboard/administracao/fabricantes')->with('success', 'Novo fabricante '.$manufacture->name.' criado com sucesso');

        } catch (\Exception $ex) {
            return redirect('/dashboard/administracao/fabricantes')->with('fail', 'Não foi possível criar o novo fabricante ' . $ex->getMessage());
        }
    }

    public function update(Request $request, int $id){
        $manufacture = Manufacture::find($id);

        if(!$manufacture)
            return redirect('/dashboard/administracao/fabricantes')->with('fail', 'Fabricante não encontrado');
        try{
            $manufacture->name = $request->name;
            $manufacture->save();
            return redirect('/dashboard/administracao/fabricantes')->with('success', 'Fabricante atualizado com sucesso');
        }catch(\Exception $ex){
            return redirect('/dashboard/administracao/fabricantes')->with('fail', 'Não foi possível atualizar o fabricante: '.$ex->getMessage());
        }

    }

    public function destroy(int $id){
        
        try{
            $manufacture = Manufacture::find($id)->delete();
            return redirect('/dashboard/administracao/fabricantes')->with('delete', 'Fabricante com id '.$id.' foi deletado');
        }catch(\Exception $ex){
            return redirect('/dashboard/administracao/fabricantes')->with('fail', 'Não foi possível atualizar o fabricante: '.$ex->getMessage());
        }
    }
}
