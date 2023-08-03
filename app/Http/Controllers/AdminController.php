<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Models\Historytask;
use App\Models\Instansi;
use App\Models\Project;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        $programmers = User::whereHas('roles' , function($q){
            $q->where('name', 'programmer'); })->get();
        // $programmers = User::whereIn('role_id', [3])->get();
        $bugs = Bug::latest()->paginate(5);
        $project = Project::all();
        $task = Task::all();
        $instansi = Instansi::all();
        $user = User::all();
        $task_walk = Historytask::all();
        // $notifications = Auth::user()->unreadNotifications;
        return view('admin.dashboard', compact('programmers','bugs', 'project', 'task','instansi','task_walk',
         'user'))->with('message', 'Hallo selamat datang');
    }
    public function markAsRead(){
        $user = User::find(auth()->user()->id);
        foreach($user->unreadNotifications as $notification){
            $notification->markAsRead();
        }
        return redirect()->back();
    }
}
