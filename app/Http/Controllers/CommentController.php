<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\CourseWork;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, CourseWork $courseWork)
    {
        $request->validate([
            'body' => 'required|string',
        ]);

        $comment = new Comment([
            'body' => $request->input('body'),
            'user_id' => auth()->id(),
        ]);

        $courseWork->comments()->save($comment);

        return redirect()->route('courseworks.show', $courseWork->id)->with('success', 'Comment added successfully');
    }

}
