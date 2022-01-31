<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\CategoryCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::orderBy('id', 'DESC')->paginate();

        return view('painel.category', [
            'page_name' => 'Painel Unyflex - Lista de categorias cadastrados',
            'categories' => $categories
        ]);
    }
    public function formCategoria()
    {
        $allCategories = Category::where('status', 'able')->orderBy('title')->get();

        return view('painel.form-category', [
            'page_name' => 'Painel Unyflex - Adicionar Categoria',
            'allcategories' => $allCategories
        ]);
    }

    public function cadCategoria(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('adicionar-categoria')->withErrors($validator);
        }

        $category = new Category();
        $category->title = $request->nome;
        $category->status = $request->status;
        if ($category->save()) {

            //adiciona novas categorias selecionadas
           
            return redirect()->route('painel-categorias')->with('message', 'course_created');
        } else {
            return redirect()->route('painel-categorias')->with('message', 'course_create_error');
        }
    }

    public function infoCategoria(Category $category)
    {
        $allCategories = Category::where('status', 'able')->orderBy('title')->get();
      
        return view('painel.category-info', [
            'page_name' => 'Painel Unyflex - Informações do Curso',
            'category' => $category,
            'allcategories' => $allCategories
        ]);
    }
    public function updCategoria(Category $category, Request $request)
    {
       
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('informacao-categoria', ['category' => $category->id])->withErrors($validator);
        }

        

        $category->title = $request->nome;
        $category->slug = $request->slug;
        $category->status = $request->status;
        
        if ($category->save()) {
            return redirect()->route('informacao-categoria', ['category' => $category->id])->with('message', 'course_updated');
        } else {
            return redirect()->route('informacao-categoria', ['category' => $category->id])->with('message', 'course_update_error');
        }
    }

    
    public function destroyCategoria(Category $category)
    {
        if ($category->delete()) {
            return redirect()->route('painel-categorias')->with('message', 'course_deleted');
        } else {
            return redirect()->route('painel-categorias')->with('message', 'course_delete_error');
        }
    }
}