<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\CourseWork;
use App\Models\Manager;
use App\Services\CourseWorkService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseWorkController extends Controller
{
    protected $courseWorkService;
    public function __construct(CourseWorkService $courseWorkService)
    {
        $this->courseWorkService = $courseWorkService;
    }

    public function index(Request $request)
    {
        $search = $request->input('search');
        $courseworks = $this->courseWorkService->searchCourseWorks($search);
        $courseworks->each(function($coursework) {
            $this->courseWorkService->loadRelationships($coursework);
        });
        return view('courseWorks.index', compact('courseworks'));
    }

    public function show(CourseWork $coursework)
    {
        $coursework->load('author', 'manager');
        return view('courseWorks.show', compact('coursework'));
    }

    public function create()
    {
        $authors = $this->courseWorkService->getAllAuthors();
        $managers = $this->courseWorkService->getAllManagers();
        return view('courseWorks.create', compact('authors', 'managers'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'manager_id' => 'required|exists:managers,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $this->courseWorkService->storeCourseWork($request);

        return redirect()->route('courseWorks.index');
    }

    public function edit(CourseWork $coursework)
    {
        $authors = $this->courseWorkService->getAllAuthors();
        $managers = $this->courseWorkService->getAllManagers();
        return view('courseWorks.update', compact('coursework', 'authors', 'managers'));
    }

    public function update(Request $request, CourseWork $coursework)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'author_id' => 'required|exists:authors,id',
            'manager_id' => 'required|exists:managers,id',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $this->courseWorkService->updateCourseWork($coursework, $request);

        return redirect()->route('courseWorks.show', $coursework->id);
    }

    public function download($id)
    {
        $coursework = CourseWork::findOrFail($id);

        if ($coursework->file_path) {

            return response()->download(storage_path('app/public/' . $coursework->file_path));
        } else {

            abort(404);
        }
    }

    public function destroy($id)
    {
        $this->courseWorkService->deleteCourseWork($id);
        return redirect()->route('courseWorks.index');
    }
}
