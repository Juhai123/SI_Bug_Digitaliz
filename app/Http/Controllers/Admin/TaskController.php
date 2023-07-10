<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bug;
use App\Models\Task;
use App\Models\User;
use App\Notifications\BugNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        // dd($request);
        $bug = Bug::find($request->bug_id);
        $data = $request->validate([
            'bug_id' => 'required' ,
            'user_id' => 'required' ,
       ]);
       
     $data['start'] = null;
     $data['end'] = null;
     $data['status'] = 'PENDING';

     $task = Task::firstOrCreate([
        'bug_id' => $request->bug_id,
        'user_id' => $request->user_id,
        
    ], $data);
    $users = User::where('id', $task->user_id)->get();
    // dd($users);
    Notification::send($users, new BugNotification($task));
    return redirect()->route('admin.bug.show', $bug->id);
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
        $task = Task::find($id);
        $task->delete();
        return redirect()->back()->with('success', 'Task di delete');
    }
}
