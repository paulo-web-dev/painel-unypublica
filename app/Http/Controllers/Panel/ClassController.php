<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller
{
    public function infoTurma(Classes $classes)
    {

        $classes = Classes::where('id', $classes->id)->with('panels')->first();
        $allteachers = Teacher::all();
        $panels = $classes->panels;

        return view('painel.class-info', [
            'page_name' => 'Painel Unyflex - Informações do Curso',
            'class' => $classes,
            'panels' => $panels,
            'allteachers' => $allteachers
        ]);
    }

    public function updTurma(Classes $classes, Request $request)
    {

        $validator = Validator::make($request->all(), [
            'titulo' => 'required|max:40',
            'subtitulo' => 'required|max:40',
            'status' => 'required',
            'dataInicio' => 'required',
            'dataTermino' => 'required',
            'tipo' => 'required',
            'cargaHoraria' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('informacao-turma', ['classes' => $classes->id])->withErrors($validator);
        }

        $classes->title = $request->titulo;
        $classes->subtitle = $request->subtitulo;
        $classes->status = $request->status;
        $classes->start_date = inverteDataHora($request->dataInicio);
        $classes->end_date = inverteDataHora($request->dataTermino);
        $classes->type = $request->tipo;
        $classes->workload = $request->cargaHoraria;

        $classes->confirmed = $request->confirmado == 'on' ? '1' : '0';
        $classes->live = $request->aovivo == 'on' ? '1' : '0';

        if ($classes->save()) {
            return redirect()->route('informacao-turma', ['classes' => $classes->id])->with('message', 'class_updated');
        } else {
            return redirect()->route('informacao-turma', ['classes' => $classes->id])->with('message', 'class_update_error');
        }
    }
}
