<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Classes;
use App\Models\Course;
use App\Models\Category;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ClassController extends Controller


{

    
    public function formTurma($course)
    {
        $courses = Course::where('id', $course)->first();
       
        return view('painel.form-class', [
            'page_name' => 'Painel Unyflex - Adicionar Curso',
            'course' => $courses
        ]);
    }


    public function cadTurma(Request $request)
    {
       if($request->confirmado=="on"){
          $confirmado="1";
       }else{
           $confirmado="0";
       }

       if($request->aovivo=="on"){
           $aovivo="1";
       }else{
           $aovivo="0";
       }

       if($request->unyflex=="on"){
        $unyflex="1";
    }else{
        $unyflex="0";
    }

  
        $class = new Classes();
        $class->title = $request->titulo;
        $class->subtitle = $request->subtitulo;
        $class->status = $request->status;
        $class->workload = $request->cargaHoraria;
<<<<<<< HEAD
        $class->slug=$request->slug;
=======
>>>>>>> 187ac075d21761cbbf15262f054ddfa464906447
        $dataInicio = $request->dataInicio;
        $dataInicio2= date('Y-m-d', strtotime($dataInicio));
        $dataTermino = $request->dataTermino;
        $dataTermino2= date('Y-m-d', strtotime($dataTermino));
       
        $class->start_date = $dataInicio2;
        $class->end_date = $dataTermino2;
        $class->type = $request->tipo;
        $class->course_id = $request->curso;
        $class->confirmed = $confirmado;
        $class->live = $aovivo;
        $class->unyflex = $unyflex;
<<<<<<< HEAD
        $class->photo = $request->file->getClientOriginalName();
        $name=$request->file->getClientOriginalName();
       
        if ($class->save()) {
            $request->file('file')->storeAs('cursos/banner', $name);
=======
        if ($class->save()) {

>>>>>>> 187ac075d21761cbbf15262f054ddfa464906447
            return redirect()->route('informacao-turma', ['classes' => $class->id])->with('message', 'course_created');
        } else {
            return redirect()->route('informacao-turma', ['classes' => $class->id])->with('message', 'course_create_error');
        }
    }

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
        if($request->unyflex=="on"){
            $unyflex="1";
        }else{
            $unyflex="0";
        }

        $classes->title = $request->titulo;
        $classes->subtitle = $request->subtitulo;
        $classes->status = $request->status;
        $classes->start_date = inverteDataHora($request->dataInicio);
        $classes->end_date = inverteDataHora($request->dataTermino);
        $classes->type = $request->tipo;
        $classes->workload = $request->cargaHoraria;
        $classes->unyflex = $unyflex;
<<<<<<< HEAD
        $classes->slug=$request->slug;
=======
>>>>>>> 187ac075d21761cbbf15262f054ddfa464906447
        $classes->confirmed = $request->confirmado == 'on' ? '1' : '0';
        $classes->live = $request->aovivo == 'on' ? '1' : '0';
        if($request->file('file')!=''){
            $classes->photo = $request->file->getClientOriginalName();
            $name=$request->file->getClientOriginalName();
            $request->file('file')->storeAs('cursos/banner', $name);
        }
      

        if ($classes->save()) {
            return redirect()->route('informacao-turma', ['classes' => $classes->id])->with('message', 'class_updated');
        } else {
            return redirect()->route('informacao-turma', ['classes' => $classes->id])->with('message', 'class_update_error');
        }
    }
}
