<?php

namespace App\Services;

use App\Models\Author;
use App\Models\CourseWork;
use App\Models\Manager;

class CourseWorkService
{
    public function searchCourseWorks($search)
    {
        $query = CourseWork::query();

        if ($search) {
            $query->where('title', 'like', "%$search%")
                ->orWhereHas('author', function($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                })
                ->orWhereHas('manager', function($query) use ($search) {
                    $query->where('name', 'like', "%$search%");
                });
        }

        return $query->get();
    }

    public function loadRelationships(CourseWork $coursework)
    {
        $coursework->load('author', 'manager', 'comments');
    }

    public function getAllAuthors()
    {
        return Author::all();
    }

    public function getAllManagers()
    {
        return Manager::all();
    }

    public function storeCourseWork($data)
    {
        $image_path = $data['image']->store('images', 'public');
        $file_path = $data['file']->store('files', 'public');
        return CourseWork::create([
            'title' => $data['title'],
            'description' => $data['description'],
            'author_id' => $data['author_id'],
            'manager_id' => $data['manager_id'],
            'image_path' => $image_path,
            'file_path' => $file_path,
        ]);
    }

    public function updateCourseWork(CourseWork $coursework, $data)
    {
        $image_path = $data['image']->store('images', 'public');
        $file_path = $data['file']->store('files', 'public');
        $coursework->update([
            'title' => $data['title'],
            'description' => $data['description'],
            'author_id' => $data['author_id'],
            'manager_id' => $data['manager_id'],
            'image_path' => $image_path,
            'file_path' => $file_path,
        ]);
    }

    public function deleteCourseWork(CourseWork $coursework)
    {
        $coursework->delete();
    }
}
