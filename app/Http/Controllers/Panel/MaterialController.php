<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Material;
use App\Models\MaterialPanels;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MaterialController extends Controller
{

    public function show()
    {
        $materials = Material::orderBy('id', 'DESC')->with('panels')->paginate();

        return view('painel.material', [
            'page_name' => 'Painel Unyflex - Lista de materiais cadastrados',
            'materials' => $materials
        ]);
    }

    public function formMaterial()
    {
        return view('painel.form-material', [
            'page_name' => 'Painel Unyflex - Adicionar Material'
        ]);
    }

    public function infoMaterial(Material $material)
    {
        $material = Material::where('id', $material->id)->with('panels')->first();
        $classes = Classes::where('status', 'able')->with('panels')->get();

        return view('painel.material-info', [
            'page_name' => 'Painel Unyflex - Informação do material Material',
            'material' => $material,
            'classes' => $classes
        ]);
    }

    public function cadMaterial(Request $request)
    {


        

        $material = new Material();
        $material->name = $request->nome;
        $material->file_name = $request->file->getClientOriginalName();
        $material->type = $request->tipo;
        $material->status = $request->status;
        $name=$request->file->getClientOriginalName();
        if ($material->save()) {
           
           $request->file('file')->storeAs('materials',$name);
            return redirect()->route('informacao-material', ['material' => $material->id])->with('message', 'success');
        } else {
            return redirect()->route('adicionar-material', ['material' => $material->id])->with('message', 'erro_cadastro');
        }
    }

    public function updMaterial(Material $material, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'tipo' => 'required',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('adicionar-material')->withErrors($validator);
        }

        if ($request->arquivo == null) {

            $material->name = $request->nome;
            $material->type = $request->tipo;
            $material->status = $request->status;

            if ($material->save()) {
                return redirect()->route('informacao-material', ['material' => $material->id])->with('message', 'material_updated');
            } else {
                return redirect()->route('adicionar-material', ['material' => $material->id])->with('message', 'material_updated_error');
            }
        }

        $material->name = $request->nome;
        $material->file_name = $request->arquivo->getClientOriginalName();
        $material->type = $request->tipo;
        $material->status = $request->status;

        if ($material->save()) {
            $request->file('arquivo')->store('materials');
            return redirect()->route('informacao-material', ['material' => $material->id])->with('message', 'material_updated');
        } else {
            return redirect()->route('adicionar-material', ['material' => $material->id])->with('message', 'material_updated_error');
        }
    }

    public function inserirMaterial(Request $request)
    {

        $materialPanel = new MaterialPanels();
        $materialPanel->material_id = $request->material;
        $materialPanel->panel_id = $request->panel;

        if ($materialPanel->save()) {
            return redirect()->route('informacao-material', ['material' => $request->material])->with('message', 'material_added');
        } else {
            return redirect()->route('informacao-material', ['material' => $request->material])->with('message', 'material_add_error');
        }
    }


    public function search(Request $request)
    {
        $filters = $request->except('_token');

        $materials = Material::where('name', 'LIKE',  "%{$request->search}%")
            ->orWhere('file_name', 'LIKE', "{$request->search}")->orderBy('id', 'DESC')->paginate();

        return view('painel.material', [
            'page_name' => 'Painel Unyflex - Lista de materiais cadastrados',
            'materials' => $materials,
            'filters' => $filters
        ]);
    }

    public function destroyMaterial(Material $material)
    {
        if ($material->delete()) {
            return redirect()->route('painel-materiais')->with('message', 'material_deleted');
        } else {
            return redirect()->route('painel-materiais')->with('message', 'material_delete_error');
        }
    }
}
