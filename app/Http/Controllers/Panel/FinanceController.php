<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\Finance;
use App\Models\CategoryCourse;
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
            'page_name' => 'Painel Unyflex - Adicionar Curso',
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
   
        return view('painel.formFluxo', [
            'page_name' => 'Painel Unyflex - Adicionar Curso',

        ]);
    }
}


