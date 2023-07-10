<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role as ModelsRole;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class ManajemenUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request);
        // $search = $request->query('search');

        // if(!empty($search)){
        //     $users = User::where('users.name','LIKE', '%' .$search. '%')
        //     ->orWhere('users.email', 'LIKE', '%' .$search. '%' )
        //     ->paginate(5);
        // }else{
        //     $users = User::latest()->paginate(5);
        // }
        $users = User::latest()->paginate(10);
        return view('admin.user.index', ['users'=>$users]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        $roless = ModelsRole::all();
        return view('admin.user.create',compact('roless', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'image' => 'image|nullable',
            'password' => 'required',
            'phone' => 'nullable',
            'job' => 'required',
            'roles' => 'required',
        ]);
        
        $input = $request->all();
        
        if ($request->hasFile('image')) {
            $file = $request->file('image')->store('bugs', 'public');
            $input['image'] = $file;
        }
        
        $input['password'] = Hash::make($input['password']);
        
        $user = User::create($input);
        $user->assignRole($request->input('roles'));
        
        return redirect()->route('admin.user.index')->with('message', 'The user has been successfully created');
        
    //     $this->validate($request, [
    //         'name' => 'required|string',
    //         'email' => 'required|email|unique:users,email',
    //         'image' => 'image|nullable',
    //         'password'=> 'required',
    //         'phone' => 'nullable' ,
    //         'job' => 'required',
    //         'role_id' => 'required', 
    //    ]);

    //    if ($request->file('image')) {
    //     $file = $request->file('image')->store('bugs', 'public');
    //     $data['image'] = $file;
    // }
    //    $input = $request->all();
       
    //    $input['password'] = Hash::make($input['password']);

    //    $user = User::create($input);
    //    $user->assignRole($request->input('roles'));


    //    $this->validate($request, [
    //     'name' => 'required|string',
    //     'email' => 'required|email|unique:users,email',
    //     'image' => 'image|nullable',
    //     'password' => 'required',
    //     'phone' => 'nullable',
    //     'job' => 'required',
    //     'roles' => 'required',
    // ]);
    
    // if ($request->file('image')) {
    //     $file = $request->file('image')->store('bugs', 'public');
    //     $input['image'] = $file;
    // }
    
    // $input = $request->all();
    // $input['password'] = Hash::make($input['password']);
    
    // $user = User::create($input);
    // $user->assignRole($request->input('roles'));

    //    return redirect()->route('admin.user.index')->with('message', 'The user success created');



    //        $user = new User;
    //        $user->name = $request->get('name');
    //        $user->email = $request->get('email');
    //        $user->password = Hash::make($request->get('password'));
    //        $user->phone = $request->get('phone');
    //        $user->job = $request->get('job');
    //        $user->role_id = $request->get('role_id');
    //        $user->assignRole('admin');

    //    if ($request->file('image')) {
    //     $file = $request->file('image')->store('bugs', 'public');
    //     $data['image'] = $file;
    //   }
    //   $user->save();
    // return redirect()->route('admin.user.index')->with('message', 'The user success created');

    
    // $new_user = new \App\Models\User;
    // $new_user->name = $request->get('name');
    // $new_user->username = $request->get('username');
    // $new_user->roles = json_encode($request->get('roles'));
    // $new_user->address = $request->get('address');
    // $new_user->phone = $request->get('phone');
    // $new_user->email = $request->get('email');
    // $new_user->password = Hash::make($request->get('password'));

    // if ($request->file('avatar')) {
    //     $file = $request->file('avatar')->store('avatars', 'public');
    //     $new_user->avatar = $file;
    // }

    // $new_user->save();
    // return redirect()->route('users.create')->with('status', 'User successfully created');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::findOrFail($id);
        return view('admin.user.show', compact('users'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = User::findOrFail($id);
        $roles = Role::all();
        return view('admin.user.edit', compact('users', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request);
        $data=$request->validate([
            'name' => 'required|string',
            'email' => 'required' ,
            'image' => 'image|nullable', 
            'phone' => 'nullable' ,
            'address' => 'nullable',
            'job' => 'required',
       ]);

       if ($request->file('image')) {
        $file = $request->file('image')->store('bugs', 'public');
        $data['image'] = $file;
    }
        $user = User::find($id);
        $user->update($data);
        return redirect()->route('admin.user.index')->with('message', 'The user success editing');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::find($id);
        $users->delete();
        return redirect()->back()->with('message', 'User success delete');;
    }
}
