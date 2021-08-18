<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Classes;
use App\Models\Panel;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('site.form');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $course = new Course();
        $course->create($request->except(['_token']));

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $Course
     * @return \Illuminate\Http\Response
     */
    public function show($id)

    {
        return Course::where('id', $id)->with('classes')->get();

    }

    public function showAll(Course $Course)

    {
        return $Course->with('classes')->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $Course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $Course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $Course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $Course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $Course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $Course)
    {
        //
    }
}
