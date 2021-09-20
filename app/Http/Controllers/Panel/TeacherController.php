<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{

    public function show()
    {
        $teachers = Teacher::all();

        return view('painel.teacher', [
            'page_name' => 'Painel Unyflex - Lista de professores cadastrados',
            'teachers' => $teachers
        ]);
    }

    public function formProfessor()
    {
        return view('painel.form-teacher', [
            'page_name' => 'Painel Unyflex - Adicionar Professor'
        ]);
    }

    public function cadProfessor(Request $request)
    {
        $teacher = new Teacher();
        $teacher->name = $request->nome;
        $teacher->cpf = $request->cpf;
        $teacher->email = $request->email;
        $teacher->phone = $request->telefone;
        $teacher->short_resume = $request->status;
        $teacher->full_resume = $request->status;
        $teacher->status = $request->status;

        if ($teacher->save()) {
            return redirect()->route('informacao-professor', ['id' => $teacher->id])->with('message', 'success');
        } else {
            return redirect()->route('informacao-professor', ['id' => $teacher->id])->with('message', 'erro');
        }
    }
}
