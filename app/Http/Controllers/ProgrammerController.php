<?php

namespace App\Http\Controllers;

use App\Models\Bug;
use App\Models\Historytask;
use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class ProgrammerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::where('user_id',auth()->user()->id)->get();
        $progress = Historytask::where('user_id',auth()->user()->id)->get();
        $pending = $progress->where('status', 'PENDING')->count();
        $on_progress = $progress->where('status', 'ON PROGRESS')->count();
        $verification = $progress->where('status', 'VERIFICATION')->count();
        $notifications = Auth::user()->unreadNotifications;
        // $notifications = Notification::all();

        return view('programmer.dashboard', compact('tasks', 'on_progress', 'pending', 'verification', 'notifications'));
    }

    public function indexNotif()
    {
        $user = Auth::user();

       
            $notifications = $user->unreadNotifications;

        return view('programmer.dashboard1', compact('notifications'));
    }


    public function markAsRead(){
        $user = User::find(auth()->user()->id);
        foreach($user->unreadNotifications as $notification){
            $notification->markAsRead();
        }
        return response()->noContent();
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
        //
    }
}
