<?php

namespace App\Http\Controllers\Merchaint;

use App\Http\Controllers\Controller;
use App\Models\dt_makanan;
use App\Models\dt_profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class MakananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $user = Auth::user();
       
        $data = dt_makanan::with(['profil'])->where('id_user', $user->id)->get();

        // Atau gunakan pagination: User::paginate(10);
        return Inertia::render(
            'Merchaint/Menu/index', [
            'Menu' => $data
            ],
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        $data = dt_profil::where('id_user', $user->id)->get();
        return Inertia::render('Merchaint/Menu/create', [
            'Profil' => $data
            ],);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_profil' => 'required',
            'makanan' => 'required|string|max:255',
            'jenis_makanan' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpg,png|max:2048',
            'harga' => 'required',

        ]);

        $imagePath = null;

if ($request->hasFile('foto')) {
    $imagePath = $request->file('foto')->store('uploads', 'public');
}

        $user = Auth::user();

       dt_makanan::create([
            'id_profil' => $request->id_profil,
            'id_user' => $user->id,
            'makanan' => $request->makanan,
            'jenis_makanan' => $request->jenis_makanan,
            'deskripsi' => $request->deskripsi,
            'foto' => $imagePath,
            'harga' => $request->harga
        ]);

        

        return redirect()->route('makanan.index');
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
         
        $user = Auth::user();

        $dataprofil = dt_profil::where('id_user', $user->id)->get();

        $data = dt_makanan::where('id_makanan', $id)->first();
    
   
        // Atau gunakan pagination: User::paginate(10);
        return Inertia::render(
            'Merchaint/Menu/edit', [
            'Menu' => $data,
            'Profil' => $dataprofil
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
       
        $item = dt_makanan::findOrFail($id);
        $request->validate([
            'id_profil' => 'required',
            'makanan' => 'required|string|max:255',
            'jenis_makanan' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:255',
            'foto' => 'required|string|max:255',
            'fotobaru' => 'image|mimes:jpg,png|max:2048',
            'harga' => 'required|numeric',
           
        ]);

        

        if ($request->hasFile('fotobaru')) {
            // Hapus gambar lama jika ada
           
            Storage::disk('public')->delete($request->fotobaru);
            

            // Simpan gambar baru
            $imagePath = $request->file('fotobaru')->store('uploads', 'public');
            
        }

     
        $item->id_profil = $request->id_profil;
        $item->makanan = $request->makanan;
        $item->jenis_makanan = $request->jenis_makanan;
        $item->deskripsi = $request->deskripsi;
        $item->foto = $imagePath;
        $item->harga = $request->harga;
    
         $item->save();
       

        return redirect()->route('makanan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $makanan = dt_makanan::findOrFail($id);

        if (Storage::disk('public')->exists($makanan->foto)) {
            Storage::disk('public')->delete($makanan->foto);
        }
        
        $makanan->delete();
    
        return redirect()->back()->with('success', 'deleted successfully.');
    }
}
