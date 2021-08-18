<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Enrollment;
use App\Models\Classes;
use App\Models\Student;
use Illuminate\Http\Request;

class EnrollmentController extends Controller
{

    public function infoMatricula(Enrollment $enrollment)
    {
        $enrollment = Enrollment::where('id', $enrollment->id)->with('student', 'classes')->first();

        $classes = Classes::get();

        return view('painel.enrollment-info', [
            'page_name' => 'Painel Unyflex - Informações da Matrícula',
            'enrollment' => $enrollment,
            'classes' => $classes
        ]);
    }

    public function formMatricula(Student $student)
    {
        $classes = Classes::get();

        return view('painel.form-enrollment', [
            'page_name' => 'Painel Unyflex - Adicionar Matrícula',
            'student' => $student,
            'classes' => $classes
        ]);
    }

    public function cadMatricula(Request $request)
    {
        $enrollment = new Enrollment();

        $enrollment->student_id = $request->idAluno;
        $enrollment->classes_id = $request->turma;
        $enrollment->modality = $request->modalidade;
        $enrollment->value = $request->valor;
        $enrollment->discount = $request->desconto;
        $enrollment->final_value = $request->valorFinal;
        $enrollment->status = $request->status;
        $enrollment->payment_method = $request->metodoPagamento;
        $enrollment->start_date = $request->dataInicio;
        $enrollment->end_date = $request->dataTermino;
        $enrollment->payday = $request->dataPagamento;
        $enrollment->invoice = $request->notaFiscal;
        $enrollment->payment_slip = $request->linkPagamento;
        $enrollment->transaction_code = $request->codigoTransacao;
        $enrollment->wallet = $request->carteira;
        $enrollment->company = $request->unidade;

        if ($enrollment->save()) {
            return redirect()->route('informacao-aluno', ['id' => $enrollment->student_id])->with('message', 'enrollment_created');
        } else {
            return redirect()->route('informacao-aluno', ['id' => $enrollment->student_id])->with('message', 'enrollment_create_error');
        }
    }

    public function updMatricula(Enrollment $enrollment, Request $request)
    {
        // if ($request->dataInicio != null) {
        //     $request->dataInicio = implode("-", array_reverse(explode("/", $request->dataInicio)));
        // }
        // if ($request->dataTermino != null) {
        //     $request->dataTermino = implode("-", array_reverse(explode("/", $request->dataTermino)));
        // }
        // if ($request->dataPagamento != null) {
        //     $request->dataPagamento = implode("-", array_reverse(explode("/", $request->dataPagamento)));
        // }

        $enrollment->student_id = $request->idAluno;
        $enrollment->classes_id = $request->turma;
        $enrollment->modality = $request->modalidade;
        $enrollment->value = $request->valor;
        $enrollment->discount = $request->desconto;
        $enrollment->final_value = $request->valorFinal;
        $enrollment->status = $request->status;
        $enrollment->payment_method = $request->metodoPagamento;
        $enrollment->start_date = $request->dataInicio;
        $enrollment->end_date = $request->dataTermino;
        $enrollment->payday = $request->dataPagamento;
        $enrollment->invoice = $request->notaFiscal;
        $enrollment->payment_slip = $request->linkPagamento;
        $enrollment->transaction_code = $request->codigoTransacao;
        $enrollment->wallet = $request->carteira;
        $enrollment->company = $request->unidade;

        if ($enrollment->save()) {
            return redirect()->route('informacao-matricula', ['enrollment' => $enrollment->id])->with('message', 'enrollment_updated');
        } else {
            return redirect()->route('informacao-matricula', ['enrollment' => $enrollment->id])->with('message', 'enrollment_update_error');
        }
    }

    public function destroyMatricula(Enrollment $enrollment)
    {
        $student = $enrollment->student_id;
        if ($enrollment->delete()) {
            return redirect()->route('informacao-aluno', ['id' => $student])->with('message', 'enrollment_deleted');
        } else {
            return redirect()->route('informacao-matricula', ['enrollment' => $enrollment->id])->with('message', 'enrollment_delete_error');
        }
    }
}
