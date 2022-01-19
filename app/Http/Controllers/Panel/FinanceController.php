<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\Finance;
use App\Models\Flow;
use App\Models\CategoryCourse;
use App\Models\Classes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FinanceController extends Controller
{
    public function show()
    {
        $expenses = Finance::orderBy('id', 'DESC')->paginate();

        return view('painel.finances', [
            'page_name' => 'Painel Unyflex - Financeiro',
            'expenses' => $expenses
        ]);
    }

    public function formDespesas()
    {
        $allCategories = Category::where('status', 'able')->orderBy('title')->get();

        return view('painel.formDespesas', [
            'page_name' => 'Painel Unyflex - Adicionar Despesa',
            'allcategories' => $allCategories
        ]);
    }

    public function cadDespesa()

    {

        $expense = new Finance();

        $expense->id=NULL;
        $expense->tipoDespesa= request('nome');
        $expense->valorDespesa=request('valor');
        $expense->mesDespesa= request('mes');
        $expense->anoDespesa= request('ano');
        $expense->produtoDespesa= request('produto');

        $expense->save();
        return redirect('/painel/financeiro');
    }

    public function destroyDespesa(Finance $despesa)
    {
        if ($despesa->delete()) {
            return redirect()->route('painel-financeiro')->with('message', 'expense_deleted');
        } else {
            return redirect()->route('painel-financeiro')->with('message', 'expense_delete_error');
        }
    }

    public function formFluxo(){

        $flows= Flow::orderBy('id','DESC')->paginate();

        return view('painel.formFluxo', [
            'page_name' => 'Painel Unyflex - Adicionar Fluxo De caixa',
            'flows'=>$flows


        ]);
    }
    public function fluxo(){

        $mytime = date('Y-m-d');
        $allCategories = Category::where('status', 'able')->orderBy('title')->get();
        $course = Classes::where('start_date', '>', $mytime)->get();
        //dd($course[1]->title);

        return view('painel.fluxo', [
            'page_name' => 'Painel Unyflex - Informações do Fluxo de caixa',
            'course' => $course,
            'allcategories' => $allCategories,
        ]);
    }
    public function cadFluxo()

    {

        $a=request('alunos0')*request('0');
        $b=request('alunos1')*request('1');
        $c=request('alunos2')*request('2');
        $d=request('alunos3')*request('3');
        $e=request('alunos4')*request('4');
        $f=request('alunos5')*request('5');
        $g=request('alunos6')*request('6');
        $h=request('alunos7')*request('7');
        $i=request('alunos8')*request('8');
        $o=$a+$b+$c+$d+$e+$f+$g+$h+$i;
        $discount=request('desconto');
        $finalvalue=$o-(($o/100)*$discount);
        $flow = new Flow();
        $flow->id=NULL;
        $flow->mes=date('m');;
        $flow->ano=date('Y');;
        $flow->numeroAlunos=request('alunos0')+request('alunos1')+request('alunos2')+request('alunos3')+request('alunos4')+request('alunos5')+request('alunos6')+request('alunos7')+request('alunos8');
        $flow->valorCurso=$o;
        $flow->desconto=$discount;
        $flow->valorFinal=$finalvalue;
        $flow->save();
        return redirect('/painel/financeiro');
    }

    public function destroyFluxo(Flow $fluxo)
    {
        if ($fluxo->delete()) {
            return redirect()->route('painel-financeiro')->with('message', 'expense_deleted');
        } else {
            return redirect()->route('painel-financeiro')->with('message', 'expense_delete_error');
        }
    }

}


