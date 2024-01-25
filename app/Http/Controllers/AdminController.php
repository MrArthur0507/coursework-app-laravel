<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'is_admin' => 'required|boolean',
        ]);
        $user->update([
            'is_admin' => $request->input('is_admin'),
        ]);

        return redirect()->route('admin.index');
    }
}
