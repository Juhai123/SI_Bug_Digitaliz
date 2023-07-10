<?php

namespace App\Http\Controllers\PICProject;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Project;
use App\Models\User;
use Illuminate\Http\Request;

class BugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        
        // $search = $request->query('search');

        // if(!empty($search)){
        //     $bugs = Bug::where('bugs.name','LIKE', '%' .$search. '%')
        //     ->orWhere('bugs.status', 'LIKE', '%' .$search. '%' )
        //     ->paginate(5);
        // }else{
        //     $bugs = Bug::latest()->paginate(5);
        // }

        $bugs = Bug::where('user_id',auth()->user()->id)->latest()->paginate(10);
        
        return view('pic.bug.index', ['bugs'=> $bugs]);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $users = User::all();
        return view('pic.bug.create', compact('projects', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $task = new Bug;
        $task->id = $request->input('id');
        $task->name = $request->input('name');
        $task->project_id = $request->input('project_id');
        $task->user_id = auth()->user()->id;
        $task->description = $request->input('description');
        $task->file = $request->input('file');
        $task->status = null ;
        $task->priority = $request->input('priority');
        $task->progress = 0;
        $task->save();

    return redirect()->route('pic.bug.index')->with('message', 'Report Bug success adding');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bug = Bug::findOrFail($id);
        $tasks = $bug->tasks;
        $url = route('admin.task.store');
        // $users = User::role(['programmer'])->get();
        $users = User::whereIn('role_id', [3])->get();
        return view('pic.bug.show', ['bug' => $bug, 'tasks' => $tasks], compact('url', 'users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bug = Bug::findOrFail($id);
        $projects = Project::all();
        return view('pic.bug.edit', compact('bug', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'project_id' => 'nullable' ,
            'description' => 'nullable' ,
            'file' => 'file|nullable' ,
           
       ]);
       $bug = Bug::find($id);
       $bug->update($data);
        return redirect()->route('pic.bug.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
