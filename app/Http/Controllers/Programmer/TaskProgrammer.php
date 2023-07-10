<?php

namespace App\Http\Controllers\Programmer;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Historytask;
use App\Models\Task;
use App\Models\User;
use App\Notifications\TaskNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class TaskProgrammer extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filterKeyword = $request->get('user_id');
        $bug = Bug::all();
        $historytask = Historytask::all();
        $query = Task::query();
        $tasks = Task::where('user_id',auth()->user()->id)->latest()->get();

        // $bug = DB::table('bugs')
        // ->join('historytask','historytask.status', '=', 'bugs.status')
        // ->get();

        // $historytask = DB::table('historytasks')
        // ->get();


        $url = route('programmer.historytask.store');
      
        return view ('programmer.task.index' ,
        compact('tasks' , 'bug', 'url'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->route('programmer.task.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, string $id)
    {
        dd ($request);
        $data = $request->validate([
            'status' => 'required' ,
            'start'=>'nullable',
            'end' =>'nullable',
       ]);
     $data['end'] = now();
     $data['status'] = 'DONE'; 
     $bug = Bug::find($id);
     $bug->update($data);
    return redirect()->route('programmer.task.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tasks = Task::findOrFail($id);
        $bug = $tasks->bug; 
        $url = route('programmer.historytask.store');
        return view('programmer.task.show',['bug' => $bug , 'tasks' => $tasks], compact('url'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // $task = Task::findOrFail($id);
        // return redirect()->route('programmer.task.update', compact('task' ));

        // dd($filterKeyword);
        
        $task = Task::find($id);
        $bug = Bug::all();
        $query = Task::query();
        $tasks = Task::where('user_id',auth()->user()->id)->latest()->paginate(5);
        return view('programmer.task.edit', compact('tasks', 'bug', ));
    }

    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $task = Task::find($request->bug_id);
        $data = $request->validate([
            'status' => 'required' ,
            'start'=>'nullable',
       ]);
       $data['status']=$request->status;
       $data['start']= now();
       
    
     $tasks = Bug::findOrFail($id);
     $users = User::find(1);
     Notification::send($users, new TaskNotification($task));
     $tasks->update($data);

    return redirect()->route('programmer.historytask.index');

    // $bug = Bug::find($request->bug_id);
    //     $data = $request->validate([
           
    //          'status' => 'required' ,
    //         'start'=>'nullable',
    //    ]);
    //    $data['start']= now();
    //    $data['status'] = 'PENDING';
    //     if ($request->start == now()) {
    //         $data['status'] = 'PENDING';
    //     }
    //     $tasks = Task::find($id);
    //     $tasks->update($data);
    //     return redirect()->route('programmer.historytask.index');

    // dd($request);
        // $data = $request->validate([
        //     'status' =>'nullable',
        //     'start' => 'nullable', 
        //     'information' => 'nullable',
        // ]);
        // $data['status'] = 'PENDING';

        // $tasks = Task::find($id);
        // if ($request->status == 'PENDING') {
        //     $data['start'] = now();
        // }
       
        // $tasks->update($data);
        // return redirect()->route('programmer.task.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tasks = Task::findOrFail($id);
        $tasks->delete();
        return redirect()->route('programmer.task.index');
    }

    
}
