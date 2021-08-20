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
}
