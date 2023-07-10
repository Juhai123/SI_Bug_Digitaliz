<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Programmer\HistoryTaskProgrammer;
use App\Models\Historytask;
use Illuminate\Http\Request;

class BugWlkingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historytasks = Historytask::all();
        return view('admin.bugwalking.index', compact('historytasks'));
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
        $historytask = Historytask::findOrFail($id);
        $historytask->status = 'ON PROGRESS';
        $historytask->save();
        return redirect()->route('admin.bugs_walking.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateVerification(Request $request, $id)
    {
        $historytask = Historytask::findOrFail($id);
        $historytask->bug_id = $request->get('bug_id');
        $historytask->task_id = $request->get('task_id');
        $historytask->user_id = $request->get('user_id');
        $historytask->status = 'VERIFICATION';
        $historytask->save();
        return redirect()->back();
    }
    
    
}
