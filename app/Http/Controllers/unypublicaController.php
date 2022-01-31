<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\Classes;
use App\Models\Panel;
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

    public function curso($slug)
    { 

        $classes=Classes::where('slug', $slug)->first();
        $class = Classes::where('slug', $slug)->with('panels')->first();
        $classes_id=$classes->id;
        $panels=Panel::where('classes_id', $classes_id)->with('teacher')->get();
        $teachers=Panel::where('classes_id', $classes_id)->with('teacher')->get();
     // dd($panels[0]->teacher);             
      return view('curso', [
            
            'class' => $classes,
            'panels'=> $panels,
            'teachers'=> $teachers
            
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