<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Panel;
use App\Models\VideoLesson;
use App\Models\Course;
use App\Models\Classes;
use App\Models\Teacher;
use App\Models\TeacherPanels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PanelController extends Controller
{
    
    public function formPainel($class)
    {
        $classes = Classes::where('id', $class)->first();
        $course_id=$classes->course_id;
        $courses= Course::where('id', $course_id)->get();
        $teachers = Teacher::all();

        return view('painel.form-panel', [
            'page_name' => 'Painel Unyflex - Adicionar Painel',
            'class' => $classes,
            'teachers'=>$teachers
        ]);
    }

    public function infoPainel(Panel $panel)
    {
        $teachers = Teacher::all();

        return view('painel.painel-info', [
            'page_name' => 'Painel Unyflex - Informações do Painel',
            'class' => $panel,
            'panel' => $panel,
            'teachers'=>$teachers
            
        ]);
    }

    public function cadPainel(Request $request)
    {

       
        $panel = new Panel();
        $panel->title = $request->titulo;
        $panel->subtitle = $request->subtitulo;
        $panel->subtitle = $request->subtitulo;
        $panel->status = $request->status;
        $panel->content=$request->conteudo;
        $panel->classes_id=$request->class_id;
        $dataInicio = $request->dataInicio;
        $dataInicio2= date('Y-m-d', strtotime($dataInicio));
        $dataTermino = $request->dataTermino;
        $dataTermino2= date('Y-m-d', strtotime($dataTermino));
        $panel->start_time=$dataInicio2;
        $panel->end_time=$dataTermino2;
        $panel->teacher_id=$request->docente;
       // dd($panel->id)
        if ($panel->save()) {
        
<<<<<<< HEAD
            if($request->unyflex==1){
=======
            if($request->unyflex=1){
>>>>>>> 187ac075d21761cbbf15262f054ddfa464906447
               $video= new VideoLesson();
               $video->panel_id=$panel->id;
               $video->link=$request->link;
               $video->tasting_link=$request->degustacao;
               $video->source=$request->source;
               $video->status=$request->status;
               $video->save();
                 
            }

            return redirect()->route('informacao-painel', ['panel' => $panel->id])->with('message', 'course_created');
        } else {
            return redirect()->route('informacao-painel')->with('message', 'course_create_error');
        }
    }

    public function updPainel(Panel $panel, Request $request)
    {
            
        
        $idTurma = $request->class_id;
/*
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
        }*/
        $panel->title = $request->titulo;
        $panel->subtitle = $request->subtitulo;
        $panel->content = $request->conteudo;
        $panel->status = $request->status;
        $panel->teacher_id=$request->docente;
        $panel->start_time = inverteDataHora($request->dataInicio);
        $panel->end_time = inverteDataHora($request->dataTermino);

        if ($panel->save()) {
            return redirect()->route('painel-cursos')->with('message', 'panel_updated');
        } else {
            return redirect()->route('painel-cursos')->with('message', 'panel_update_error');
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
