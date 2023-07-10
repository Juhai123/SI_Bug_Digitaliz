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

class HistoryTaskProgrammer extends Controller
{
    /**s
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
       $tasks = Historytask::where('user_id', auth()->user()->id)->latest()->get();

    //    dd($tasks);
        return view('programmer.historytask.index',compact('tasks'));

        // $bug = DB::table('bugs')
        // ->join('project', 'project.id', '=', 'bugs.project_id')
        // ->join('user', 'users.id', '=', 'bugs.user_id')
        // ->get();

        // $project = DB::table('projects')
        // ->get();

        // $user = DB::table('users')
        // ->get();

        // $tasks= Task::where('user_id',auth()->user()->id)->latest()->paginate(5);
        // return view ('programmer.historytask.index' , compact('tasks'));

        // return view('programmer.historytask.index', ['bug' => $bug , 'project' => $project , 'user' => $user], compact('tasks'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bug = Bug::all();
        return view('programmer.historytask.store', compact('bug'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request);
        
        $task = new Historytask;
        // $task->id = $request->input('id');
        $task->bug_id = $request->input('bug_id');
        $task->task_id = $request->input('task_id');
        $task->user_id = $request->input('user_id');
        $task->information = $request->input('information');
        $task->status = 'PENDING';
    
        $task->save();
        // $task->create();
        
        return redirect()->route('programmer.historytask.index');


    // return redirect()->route('programmer.historytask.index');
    
    //     $data = $request->validate([
    //         'status' =>'required',
    //         'end' =>'nullable',
    //         'information' =>'required',
    //    ]);
    //    $task = Task::find($id);
    //    $task->create($data);
        // return redirect()->route('programmer.historytask.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $task = Task::findOrFail($id);
        $bug = Bug::all();
        return view('programmer.historytask.edit', compact('task', 'bug'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request);
        $task = Historytask::findOrFail($id);
        $task->bug_id = $request->get('bug_id');
        $task->task_id = $request->get('task_id');
        $task->user_id = $request->get('user_id');
        $task->information = $request->get('information');
        $task->status = $request->get('status');
        $task->progress = $request->get('status');
        $task->end = $request->get('end');

        if ($task->status= 'DONE') {
            $task->end= now();
            $task->progress = 100;
        }
        // $task = Historytask::find($id);
        $task->save();
        return redirect()->route('programmer.historytask.index');
// dd($request);
//         $data = $request->validate([
//             'bug_id' => 'required' ,
//             'user_id'  => 'required',
//                 'status' =>'required',
//                 'progress' => 'nullable',
//                 'end' => 'nullable',
//                 'information' => 'nullable',
//         ]);
//         if ($request->status == 'DONE') {
//             $data['end'] = now() && $data['progress']=100;
//         }

//         $historytask = Historytask::find($id);
//         $historytask->update($data);

//         $users = User::whereIn('id',[7])->get();
//         Notification::send($users, new TaskNotification($historytask));
//         return redirect()->route('programmer.historytask.index');
       
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
