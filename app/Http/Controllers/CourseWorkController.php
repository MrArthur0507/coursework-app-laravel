<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\CourseWork;
use App\Models\Manager;
use Illuminate\Http\Request;

class CourseWorkController extends Controller
{
    public function index()
    {
        $courseworks = CourseWork::all();
        return view('courseworks.index', compact('courseworks'));
    }

    public function show(CourseWork $coursework)
    {
        return view('courseworks.show', compact('coursework'));
    }

    public function create()
    {
        $authors = Author::all();
        $managers = Manager::all();
        return view('courseworks.create', compact('authors', 'managers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'manager_id' => 'required|exists:managers,id',
        ]);

        $coursework = CourseWork::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author_id' => $request->input('author_id'),
            'manager_id' => $request->input('manager_id'),
        ]);

        return redirect()->route('courseworks.index');
    }

    public function edit(CourseWork $coursework)
    {
        $authors = Author::all();
        $managers = Manager::all();
        return view('courseworks.edit', compact('coursework', 'authors', 'managers'));
    }

    public function update(Request $request, CourseWork $coursework)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'manager_id' => 'required|exists:managers,id',
        ]);

        $coursework->update([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author_id' => $request->input('author_id'),
            'manager_id' => $request->input('manager_id'),
        ]);

        return redirect()->route('courseworks.show', $coursework->id);
    }

    public function destroy(CourseWork $coursework)
    {
        $coursework->delete();

        return redirect()->route('courseworks.index');
    }
}
