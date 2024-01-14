<?php

namespace App\Http\Controllers;

use App\Models\Manager;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function index()
    {
        $managers = Manager::all();
        return view('managers.index', compact('managers'));
    }

    public function show(Manager $manager)
    {
        return view('managers.show', compact('manager'));
    }

    public function create()
    {
        return view('managers.create');
    }

    public function edit(Manager $manager)
    {
        return view('managers.update', compact('manager'));
    }

    public function store(Request $request)
    {

        $manager = Manager::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'department' => $request->input('department'),
        ]);

        return redirect()->route("managers.index");
    }

    public function update(Request $request, Manager $manager)
    {


        $manager->update([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'department' => $request->input('department'),
        ]);

        return redirect()->route('managers.index');
    }

    public function destroy(Manager $manager)
    {
        $manager->delete();
        return view('managers.index');
    }
}
