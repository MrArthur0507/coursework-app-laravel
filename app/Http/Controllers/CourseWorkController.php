<?php

namespace App\Http\Controllers;

use App\Models\CourseWork;
use Illuminate\Http\Request;

class CourseWorkController extends Controller
{
    public function index()
    {
        $courses = CourseWork::all();
        return view('courses.index', compact('courses'));
    }

    public function show(CourseWork $course)
    {
        return view('courses.show', compact('course'));
    }

    public function create()
    {
        return view('courses.create');
    }

    public function store(Request $request)
    {

        $course = CourseWork::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author_id' => $request->input('author_id'),
            'manager_id' => $request->input('manager_id'),
        ]);

        return view('courses.index');
    }

    public function destroy(CourseWork $course)
    {
        $course->delete();
        return view('courses.index');
    }
}
