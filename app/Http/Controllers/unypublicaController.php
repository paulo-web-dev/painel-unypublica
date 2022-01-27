<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\Classes;
use App\Models\CategoryCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class unypublicaController extends Controller
{
    public function index()
    { 
        $hoje=  date('Y-m-d');
        $presenciais = Classes::where('start_date','>', $hoje)
        ->where('unyflex',0)->with('panels')->get();

        $online = Classes::where('unyflex',1)->with('panels')->get();
       // dd($online);
                            
      return view('index', [
            
            'presenciais' => $presenciais,
            'onlines' => $online,
        ]);
    }


    public function agendados()
    { 
        $hoje=  date('Y-m-d');
        $agendados = Classes::where('start_date','>', $hoje)
        ->where('unyflex',0)
        ->with('panels')->get();
       // dd($online);
                            
      return view('agendados', [
            
            'agendados' => $agendados,
            
        ]);
    }
}