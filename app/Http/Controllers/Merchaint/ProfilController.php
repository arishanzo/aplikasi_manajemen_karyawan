<?php

namespace App\Http\Controllers\Merchaint;

use App\Http\Controllers\Controller;
use App\Models\dt_profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();

        $data = dt_profil::where('id_user', $user->id)->get();
    
   
        // Atau gunakan pagination: User::paginate(10);
        return Inertia::render(
            'Merchaint/Profil/index', [
            'Profil' => $data
            ],
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Merchaint/Profil/create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kontak' => 'required|string|max:12',
            'deskripsi' => 'required|string|max:255',
           
        ]);

        $user = Auth::user();

        dt_profil::create([
            'id_user' => $user->id,
            'nama_perusahaan' => $request->nama_perusahaan,
            'alamat' => $request->alamat,
            'kontak' => $request->kontak,
            'deskripsi_perusahaan' => $request->deskripsi,
        ]);
      
        return redirect()->route('profil.index');
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
    public function edit($id_profil)
    {
        
        $data = dt_profil::where('id_profil', $id_profil)->first();
    
   
        // Atau gunakan pagination: User::paginate(10);
        return Inertia::render(
            'Merchaint/Profil/edit', [
            'Profil' => $data
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $item = dt_profil::findOrFail($id);
        $request->validate([
            
            'nama_perusahaan' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'kontak' => 'required|string|max:12',
            'deskripsi' => 'required|string|max:255',
           
        ]);

     
        $item->id_user = $request->id_user;
        $item->nama_perusahaan = $request->nama_perusahaan;
        $item->alamat = $request->alamat;
        $item->kontak = $request->kontak;
        $item->deskripsi_perusahaan = $request->deskripsi;
    
         $item->save();
       

        return redirect()->route('profil.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = dt_profil::findOrFail($id);
        $post->delete();
    
        return redirect()->back()->with('success', 'deleted successfully.');
    }
}
