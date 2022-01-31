<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Subscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class StudentController extends Controller
{

    public function show()
    {

        $students = Student::all();

        return view('painel.student', [
            'page_name' => 'Painel Unyflex - Lista de alunos cadastrados',
            'students' => $students
        ]);
    }

    public function infoAluno($id)
    {
        $student = Student::where('id', $id)->with('enrollment')->first();
        $subscription = Subscription::where('student_id', $id)->get();


        return view('painel.student-info', [
            'page_name' => 'Painel Unyflex - Informações do Aluno',
            'student' => $student,
            'subscription' => $subscription
        ]);
    }

    public function formAluno()
    {
        return view('painel.form-student', [
            'page_name' => 'Painel Unyflex - Adicionar Aluno'
        ]);
    }

    public function cadAluno(Request $request)
    {
        $student = new Student();
        $student->name = $request->nome;
        $student->cpf = $request->cpf;
        $student->password = Hash::make($request->cpf);
        $student->email = $request->email;
        $student->phone = $request->telefone;
        $student->cep = $request->cep;
        $student->street = $request->rua;
        $student->house_number = $request->num;
        $student->district = $request->bairro;
        $student->city = $request->cidade;
        $student->state = $request->uf;
        $student->photo = $request->file->getClientOriginalName();
        $name=$request->file->getClientOriginalName();

        if ($student->save()) {
            $request->file('file')->storeAs('alunos/perfil', $name);
            return redirect()->route('informacao-aluno', ['id' => $student->id])->with('message', 'success');
        } else {
            return redirect()->route('informacao-aluno', ['id' => $student->id])->with('message', 'erro');
        }
    }

    public function updAluno(Request $request, Student $student)
    {
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $student->email = $request->email;
        }

        $student->name = $request->nome;
        $student->cpf = $request->cpf;
        $student->phone = $request->telefone;
        $student->cep = $request->cep;
        $student->street = $request->rua;
        $student->house_number = $request->num;
        $student->district = $request->bairro;
        $student->city = $request->cidade;
        $student->state = $request->uf;
        if($request->file('file')!=''){
            $student->photo = $request->file->getClientOriginalName();
            $name=$request->file->getClientOriginalName();
            $request->file('file')->storeAs('alunos/perfil', $name);
        }
      

        if ($student->save()) {
            return redirect()->route('informacao-aluno', ['id' => $student->id])->with('message', 'atualizado');
        } else {
            return redirect()->route('informacao-aluno', ['id' => $student->id])->with('message', 'erro');
        }
    }

    public function destroyAluno(Student $student)
    {
        if ($student->delete()) {
            return 'sucesso';
        }
    }
}
