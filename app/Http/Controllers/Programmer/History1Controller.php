<?php

namespace App\Http\Controllers\Programmer;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class History1Controller extends Controller
{

    public function show($id){
        
        $tasks = Task::where('user_id', '=',  Auth::user()->id)->
                where('id', '=', $id)->latest()->get();
                
        return view('programmer.history1.show',compact('tasks'));
    
    }

    public function store(Request $request)
    {
        // dd($request);
        $task = new Task;
        // $task->id = $request->get('id');
        $task->bug_id = $request->get('bug_id');
        // $task->task_id = $request->input('task_id');
        $task->user_id = $request->get('user_id');
        // $task->information = $request->get('information');
        $task->status = 'PENDING';
    
        $task->update();
        return redirect()->route('programmer.coba.index');
    }
    
}
