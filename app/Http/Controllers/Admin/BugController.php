<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Historytask;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use App\Notifications\BugNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Spatie\Permission\Models\Role;

class BugController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
         // $query = Project::query();

        // $projects = $query->latest()->paginate(5);
        // $bugs = Bug::all();
        $search = $request->query('search');
        if(!empty($search)){
            $bugs = Bug::where('bugs.name','LIKE', '%' .$search. '%')
            ->orWhere('bugs.status', 'LIKE', '%' .$search. '%' )
            ->paginate(5);
        }else{
            $bugs = Bug::latest()->paginate(5);
        }
        
        return view('admin.bug.index', ['bugs'=> $bugs],['search'=> $search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        $users = User::all();
        return view('admin.bug.create', compact('projects', 'users'));
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
        if ($task->file='file') {
                $file = $request->file('file')->store('bugs', 'public');
                $task['file'] = $file;
              }

        $task->save();

    //     $data = $request->validate([

    //         'name' => 'required|string',
    //         'project_id' => 'required' ,
    //         'user_id'=> 'nullable',
    //         'description' => 'nullable' ,
    //         'file' => 'file|nullable' ,
    //         'status' => 'nullable' ,
    //         'priority' => 'nullable' ,
    //         'progress'=> 'required',

    //    ]);

    //    $data['project_id'] = request('project_id');
      
    //    if ($request->file('file')) {
    //     $file = $request->file('file')->store('bugs', 'public');
    //     $data['file'] = $file;
    //   }
    //   $data['status']= null;
    //   $data['progress']= 0 ;
      

    //     Bug::firstOrCreate([
    //     'project_id' => $request->project_id,
    // ], $data);
    // Bug::create($data);
    return redirect()->route('admin.bug.index')->with('message', 'Report Bug success adding');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $bug = Bug::findOrFail($id);
        $task = $bug->task; 
        $url = route('admin.task.store');
      
        // $users = User::whereIn('role_id', [3])->get();
        $users = User::whereHas('roles' , function($q){
            $q->where('name', 'programmer'); })->get();
            $historytasks = Historytask::all();
        activity()->performedOn($bug)->log('Show Bug');
        // Notification::send($users, new BugNotification($task));
        return view('admin.bug.show', ['bug' => $bug , 'task' => $task], compact('url', 'users', 'historytasks'))
        ->with('message', 'Programmer success created');
         
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $bug = Bug::findOrFail($id);
        $projects = Project::all();
        activity()->performedOn($bug)->log('Edit Bug');
        return view('admin.bug.edit', compact('bug', 'projects'));
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
            'status' => 'required',
           
       ]);
       if ($request->file('file')) {
        $file = $request->file('file')->store('bugs', 'public');
        $data['file'] = $file;
    }
       $bug = Bug::find($id);
       $bug->update($data);
       activity()->performedOn($bug)->log('Update Bug');
        return redirect()->route('admin.bug.index')->with('message', 'Report Bug success editing');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $task = Task::find($id);
        $task->delete();
        return redirect()->route('admin.bug.show');
    }


}
