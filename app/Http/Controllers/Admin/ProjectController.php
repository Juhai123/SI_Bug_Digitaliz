<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use App\Models\Project;
use App\Models\Project_user;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        if(!empty($search)){
            $projects = Project::where('projects.project_name','LIKE', '%' .$search. '%')
            ->paginate(5);
        }else{
            $projects = Project::latest()->paginate(5);
        }
        return view('admin.project.index', ['projects'=> $projects],['search'=> $search]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instansis = Instansi::all();
        $users = User::whereHas('roles' , function($q){
            $q->where('name', 'pic_project'); })->get();
       
        // $users = User::whereIn('role_id', [2])->get();
        return view('admin.project.create', compact('instansis', 'users'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd ($request);
    //     $data = $request->validate([
    //         'project_name' => 'required|string',
    //         'instansi_id' => 'required' ,
    //         'link'=> 'required',
    //         'user_id' => 'required' ,
    //    ]);
       
    //    Project::firstOrCreate([
    //         'instansi_id' => $request->instansi_id,
    //         'user_id' => $request->user_id,
    //     ], $data);
    
   
    $project = [
        'id' => $request->id,
        'project_name'=>$request->project_name,
        'instansi_id'=>$request->instansi_id,
        'link'=>$request->link,
        'user_id'=>$request->user_id,
    ];

    Project::where('id', $request->id)->create($project);

    // $project_id = Project_user::where('project_id', ['id' =>$project])->get();
    // $project_user = [
    //     'id' => $request->id,
    //     'project_id' => $request->$project_id,
    //     'user_id' =>$request->user_id,
    // ]; 
    //  dd($project_user);
    // Project_user::where('id', $request->id)->create($project_user, $project_id);

    // Project::create($data);
    return redirect()->route('admin.project.index')->with('message', 'The project success adding');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project = Project::findOrFail($id);
        $instansi = Instansi::all();
        $user = User::whereIn('role_id', [3])->get();
        return view('admin.project.show', compact('project', 'instansi', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project = Project::findOrFail($id);
        $instansis = Instansi::all();
        $users = User::whereIn('role_id', [2])->get();
        return view('admin.project.edit', compact('project', 'instansis', 'users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'project_name' => 'required|string',
            'instansi_id' => 'required' ,
            'link'=> 'required',
            'user_id' => 'required' ,
           
       ]);
       $project = Project::find($id);
       $project->update($data);
        return redirect()->route('admin.project.index')->with('message', 'The project success editing');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
