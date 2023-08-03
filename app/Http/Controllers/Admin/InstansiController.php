<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // dd($request);
        // $search = $request->query('search');

        // if(!empty($search)){
        //     $instansis = Instansi::where('instansis.instansi_name','LIKE', '%' .$search. '%')
        //     ->paginate(5);
        // }else{
        //     $instansis = Instansi::latest()->paginate(5);
        // }
        $instansis = Instansi::all();
        
        return view('admin.instansi.index', compact('instansis'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.instansi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([

            'instansi_name' => 'required|string',
           
       ]);
    Instansi::create($data);
    return redirect()->route('admin.instansi.index')->with('message', 'The Instansi success created');
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
        $data = $request->validate([
            'instansi_name' => 'required',
           
       ]);
       $instansi = Instansi::find($id);
       $instansi->update($data);
        return redirect()->back()->with('message', 'The instansi success editing');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $instansi = Instansi::find($id);
        $instansi->delete();
        return redirect()->back()->with('message', 'The Instansi success deleted');
    }
}
