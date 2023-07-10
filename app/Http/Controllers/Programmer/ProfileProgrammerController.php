<?php

namespace App\Http\Controllers\Programmer;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileProgrammerController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('programmer.profile.index', compact('user'));
    }

    public function edit(){
        $users = User::findOrFail(Auth::id());
        return view('programmer.profile.edit', compact('users'));
    }
    
    public function update(Request $request){
$data = $request->validate([
    'name' => 'required|string',
    'email' => 'required',
    'image' => 'image|nullable',
    'phone' => 'nullable',
    'address' => 'nullable',
    'job' => 'required',
]);

if ($request->file('image')) {
    $file = $request->file('image')->store('bugs', 'public');
    $data['image'] = $file;
}

$user = User::findOrFail(Auth::id());
$user->update($data);

        return redirect()->route('programmer.profile.index');
    }

    public function changePassword(Request $request){
        $user = Auth::user();
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        //cek kesamaan password
        if (!(Hash::check($request->get('old_password'), $user->password))) {
            return redirect()->back()->with("error", "Your current password does not matches with the password.");
        }

        //cek kesamaan password lama dan baru
        if (strcmp($request->get('old_password'), $request->get('password')) == 0) {
            return redirect()->back()->with("error", "New Password cannot be same as your current password.");
        }

        //update password in table user
        $user = User::findOrFail(Auth::id());
        $user->password = bcrypt($request->get('password'));
        $user->save();

        //redirect back
        return redirect()->back()->with('message', 'Password berhasil diupdate');
    }
}
