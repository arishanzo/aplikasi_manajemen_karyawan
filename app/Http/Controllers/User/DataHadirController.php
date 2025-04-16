<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DataDepartemen;
use App\Models\DataHadir;
use App\Models\DataKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DataHadirController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
      
        $user = Auth::user();
       if($user->role === 'user'){
        $data = DataHadir::with(['user'])->where('id', $user->id)->get();
         // Atau gunakan pagination: User::paginate(10);
         return Inertia::render(
            'User/DataHadir', [
            'Hadir' => $data
            ],
        );
       }else{
        $departemen = DataDepartemen::all();
      

        if ($request->filled('departemen')) {
            $data = DataHadir::with('karyawan') 
            ->whereHas('karyawan', function ($query) use ($request) {
                $query->where('departemen', $request->departemen);  
            })
            ->get();
        }else{
            $data = DataHadir::with(['karyawan'])->get(); 
        }

         // Atau gunakan pagination: User::paginate(10);
         return Inertia::render(
            'Manajemen/DataHadir', [
            'Hadir' => $data,
            'Departemen' => $departemen,
            'filters' => [
                'departemen' => $request->departemen,
            ],
            ],
        );
       }

       
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $user = Auth::user();
       
        $data = DataKaryawan::with(['user'])->where('id', $user->id)->first();

        return Inertia::render('User/TambahDataHadir',  [
            'Karyawan' => $data
            ],);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            'kode_karyawan' => 'required|string|max:255',
            'tgl_hadir' => 'required|date',
            'status' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $user = Auth::user();

        DataHadir::create([
            'id' => $user->id,
            'kode_karyawan' => $request->kode_karyawan,
            'tgl_hadir' => $request->tgl_hadir,
            'status' => $request->status,
            'keterangan' => $request->keterangan
        ]);
      
        return redirect()->route('DataHadir.index');
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
    public function edit($id_hadir)
    {
        //

        $data = DataHadir::where('id_hadir', $id_hadir)->first();
    
   
        // Atau gunakan pagination: User::paginate(10);
        return Inertia::render(
            'User/EditDataHadir', [
            'Hadir' => $data
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $item = DataHadir::findOrFail($id);
        $request->validate([
            'tgl_hadir' => 'required|date',
            'status' => 'required|string|max:255',
            'keterangan' => 'required|string|max:255',
        ]);

        $item->tgl_hadir = $request->tgl_hadir;
        $item->status = $request->status;
        $item->keterangan = $request->keterangan;
         $item->save();
       

        return redirect()->route('DataHadir.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

        $post = DataHadir::findOrFail($id);
        $post->delete();
    
        return redirect()->back()->with('success', 'deleted successfully.');
    }
}
