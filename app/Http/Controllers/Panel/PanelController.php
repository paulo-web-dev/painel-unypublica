<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel;
use App\Models\TeacherPanels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PanelController extends Controller
{
    //
    public function updPainel(Panel $panel, Request $request)
    {
        $idTurma = $request->idTurma;

        $validator = Validator::make($request->all(), [
            'titulo' => 'required|max:40',
            'subtitulo' => 'required|max:40',
            'status' => 'required',
            'dataInicio' => 'required',
            'dataTermino' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('informacao-turma', ['classes' => $idTurma])->withErrors($validator);
        }

        //exclui todas as categorias do curso atual
        $teachersPanel = TeacherPanels::where('panel_id', $panel->id)->get();
        foreach ($teachersPanel as $teacherPanel) {
            $teacherPanel->delete();
        }

        //adiciona novas categorias selecionadas
        foreach ($request->docentes as $docente) {
            $teacherPanel = new TeacherPanels();
            $teacherPanel->panel_id = $panel->id;
            $teacherPanel->teacher_id = $docente;
            $teacherPanel->save();
        }

        $panel->title = $request->titulo;
        $panel->subtitle = $request->subtitulo;
        $panel->content = $request->conteudo;
        $panel->status = $request->status;
        $panel->start_time = inverteDataHora($request->dataInicio);
        $panel->end_time = inverteDataHora($request->dataTermino);

        if ($panel->save()) {
            return redirect()->route('informacao-turma', ['classes' => $idTurma])->with('message', 'panel_updated');
        } else {
            return redirect()->route('informacao-turma', ['classes' => $idTurma])->with('message', 'panel_update_error');
        }
    }

    public function destroyPainel(Panel $panel, Request $request)
    {
        $idTurma = $request->idTurma;

        if ($panel->delete()) {
            return redirect()->route('informacao-turma', ['classes' => $idTurma])->with('message', 'panel_deleted');
        } else {
            return redirect()->route('informacao-turma', ['classes' => $idTurma])->with('message', 'panel_delete_error');
        }
    }
}
