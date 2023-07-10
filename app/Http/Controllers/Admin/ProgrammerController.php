<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Project;
use App\Models\Project_user;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class ProgrammerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $users = User::whereIn('role_id', [3])->get();
        $users = User::whereHas('roles' , function($q){
            $q->where('name', 'programmer'); })->get();
       
        return view('admin.programmer.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
        // $bugs = Bug::where('user_id', auth()->user()->id)->get();
        $tasks = Task::all();
        $task = $users->task;

        return view('admin.programmer.show', ['users' => $users, 'task' => $task], compact('task'));

        // $users = User::findOrFail($id);
        // $bugs = Bug::where('user_id', auth()->user()->id)->get();
        // return view('admin.programmer.show', compact('bugs', 'users'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
