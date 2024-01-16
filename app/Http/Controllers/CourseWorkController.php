<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\CourseWork;
use App\Models\Manager;
use Illuminate\Http\Request;

class CourseWorkController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $query = CourseWork::query();

        if ($search) {
            $query->where('title', 'like', "%$search%")
                ->orWhere('description', 'like', "%$search%");
        }

        $courseworks = $query->get();
        $courseworks->load('author', 'manager');

        return view('courseWorks.index', compact('courseworks'));
    }

    public function show(CourseWork $coursework)
    {
        $coursework->load('author', 'manager');
        return view('courseWorks.show', compact('coursework'));
    }

    public function create()
    {
        $authors = Author::all();
        $managers = Manager::all();
        return view('courseWorks.create', compact('authors', 'managers'));
    }

    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'manager_id' => 'required|exists:managers,id',

        ]);
        $image_path = $request->file('image')->store('images', 'public');
        $coursework = CourseWork::create([
            'title' => $request->input('title'),
            'description' => $request->input('description'),
            'author_id' => $request->input('author_id'),
            'manager_id' => $request->input('manager_id'),
            'image_path' => $image_path,
        ]);

        return redirect()->route('courseworks.index');
    }

    public function edit(CourseWork $coursework)
    {
        $authors = Author::all();
        $managers = Manager::all();
        return view('courseWorks.update', compact('coursework', 'authors', 'managers'));
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

        return redirect()->route('courseWorks.show', $coursework->id);
    }

    public function destroy(CourseWork $coursework)
    {
        $coursework->delete();

        return redirect()->route('courseWorks.index');
    }
}
