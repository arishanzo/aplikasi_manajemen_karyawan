<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use App\Models\DataDepartemen;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DataDepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        
        $data = DataDepartemen::all();


        // Atau gunakan pagination: User::paginate(10);
        return Inertia::render(
            'Manajemen/DataDepartemen', [
            'Departemen' => $data
            ],
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return Inertia::render('Manajemen/TambahDataDepartemen');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        
        $request->validate([
            
            'kode_departemen' => 'required|string|max:12',
            'nama_departemen' => 'required|string|max:255',
        ]);

        DataDepartemen::create([
            'kode_departemen' => $request->kode_departemen,
            'nama_departemen' => $request->nama_departemen
        ]);
      
        return redirect()->route('DataDepartemen.index');
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
    public function edit($id)
    {
        //
        
        $data = DataDepartemen::where('id_departemen', $id)->first();
    
   
        // Atau gunakan pagination: User::paginate(10);
        return Inertia::render(
            'Manajemen/EditDataDepartemen', [
            'Departemen' => $data
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

         //
         $item = DataDepartemen::findOrFail($id);
         $request->validate([
            'kode_departemen' => 'required|string|max:12',
            'nama_departemen' => 'required|string|max:255',
         ]);
 
      
         $item->kode_departemen = $request->kode_departemen;
         $item->nama_departemen = $request->nama_departemen;
               $item->save();
        
 
         return redirect()->route('DataDepartemen.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = DataDepartemen::findOrFail($id);
        $post->delete();
    
        return redirect()->back()->with('success', 'deleted successfully.');
    }
}
