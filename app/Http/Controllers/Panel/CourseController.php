<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Category;
use App\Models\CategoryCourse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CourseController extends Controller
{
    public function show()
    {
        $courses = Course::orderBy('id', 'DESC')->paginate();

        return view('painel.course', [
            'page_name' => 'Painel Unyflex - Lista de cursos cadastrados',
            'courses' => $courses
        ]);
    }

    public function formCurso()
    {
        $allCategories = Category::where('status', 'able')->orderBy('title')->get();

        return view('painel.form-course', [
            'page_name' => 'Painel Unyflex - Adicionar Curso',
            'allcategories' => $allCategories
        ]);
    }

    public function infoCurso(Course $course)
    {
        $allCategories = Category::where('status', 'able')->orderBy('title')->get();
        $course = Course::where('id', $course->id)->with('categories', 'classes')->first();

        return view('painel.course-info', [
            'page_name' => 'Painel Unyflex - Informações do Curso',
            'course' => $course,
            'allcategories' => $allCategories,
            'categories' => $course->categories
        ]);
    }

    public function search(Request $request)
    {
        $filters = $request->except('_token');
        $courses = Course::where('title', 'LIKE',  "%{$request->search}%")
            ->orWhere('slug', 'LIKE', "%{$request->search}%")->orderBy('id', 'DESC')->paginate();

        return view('painel.course', [
            'page_name' => 'Painel Unyflex - Lista de materiais cadastrados',
            'courses' => $courses,
            'filters' => $filters
        ]);
    }

    public function cadCurso(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('adicionar-curso')->withErrors($validator);
        }

        $course = new Course();
        $course->title = $request->nome;
        $course->status = $request->status;
        if ($course->save()) {

            //adiciona novas categorias selecionadas
            foreach ($request->categorias as $categoria) {
                //dd($request->categorias);
                $categoryCourse = new CategoryCourse();
                $categoryCourse->course_id = $course->id;
                $categoryCourse->category_id = $categoria;
                $categoryCourse->save();
            }
            return redirect()->route('informacao-curso', ['course' => $course->id])->with('message', 'course_created');
        } else {
            return redirect()->route('informacao-curso', ['course' => $course->id])->with('message', 'course_create_error');
        }
    }

    public function updCurso(Course $course, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nome' => 'required|max:255',
            'status' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->route('informacao-curso', ['course' => $course->id])->withErrors($validator);
        }

        //exclui todas as categorias do curso atual
        $categoryCourse = CategoryCourse::where('course_id', $course->id)->get();
        foreach ($categoryCourse as $categoriaCurso) {
            $categoriaCurso->delete();
        }

        //adiciona novas categorias selecionadas
        foreach ($request->categorias as $categoria) {
            $categoryCourse = new CategoryCourse();
            $categoryCourse->course_id = $course->id;
            $categoryCourse->category_id = $categoria;
            $categoryCourse->save();
        }

        $course->title = $request->nome;
        $course->status = $request->status;
        if ($course->save()) {
            return redirect()->route('informacao-curso', ['course' => $course->id])->with('message', 'course_updated');
        } else {
            return redirect()->route('informacao-curso', ['course' => $course->id])->with('message', 'course_update_error');
        }
    }

    public function destroyCurso(Course $course)
    {
        if ($course->delete()) {
            return redirect()->route('painel-cursos')->with('message', 'course_deleted');
        } else {
            return redirect()->route('painel-cursos')->with('message', 'course_delete_error');
        }
    }
}
