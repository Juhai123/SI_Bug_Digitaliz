<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Historytask;
use Illuminate\Http\Request;

class VerificationbugController extends Controller
{
    public function updateVerification(Request $request, $id)
    {
        // dd($request);
        
        $task = Historytask::findOrFail($id);
        // $historytask->bug_id = $request->get('bug_id');
        // $historytask->task_id = $request->get('task_id');
        // $historytask->user_id = $request->get('user_id');
        $task->status = 'VERIFIED';
        $task->save();
        return redirect()->back();
    }
}
