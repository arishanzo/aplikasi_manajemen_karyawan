<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DataDepartemen;
use App\Models\DataHadir;
use App\Models\DataKaryawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class DataKaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $user = Auth::user();

       

        if($user->role === 'user'){
            $data = DataKaryawan::with(['user'])->where('id', $user->id)->first();
            if (!$data) {
                $data = DataKaryawan::with(['user'])->where('id', $user->id)->get();
            }

              // Atau gunakan pagination: User::paginate(10);
        return Inertia::render(
            'User/DataKaryawan', [
            'Karyawan' => $data
            ],
        );

        }else{
            $data = DataKaryawan::all();

              // Atau gunakan pagination: User::paginate(10);
        return Inertia::render(
            'Manajemen/DataKaryawan', [
            'Karyawan' => $data
            ],
        );
        }

      
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
      
        $data = DataDepartemen::all();
        return Inertia::render('User/TambahDataKaryawan', [
            'Departemen' => $data
            ],);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        

        $request->validate([
            'id_departemen' => 'required',
            'kode_karyawan' => 'required|string|max:255',
            'nama_karyawan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sekolah' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'linkmedsos' => 'required|string|max:255',
            'dokumen' => 'nullable|mimes:pdf|max:1048'

        ],
        [
            'dokumen.mimes' => 'Wajib PDF',
            'dokumen.max' => 'Maxsimal file 1MB',
        ]
    );

    $file = $request->file('dokumen');
    $filename = time() . '_' . $file->getClientOriginalName();
    
    $file->move(public_path('files'), $filename);
    

        $user = Auth::user();
        
        $departemen = DataDepartemen::where('id_departemen', $request->id_departemen)->first();

       DataKaryawan::create([
            'id_departemen' => $request->id_departemen,
            'id' => $user->id,
            'kode_karyawan' => $request->kode_karyawan,
            'departemen' => $departemen->nama_departemen,
          'nama_karyawan' => $request->nama_karyawan,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'email' => $request->email,
            'sekolah' => $request->sekolah,
            'jurusan' => $request->jurusan,
            'linkmedsos' => $request->linkmedsos,
            'dokumen' => 'files/' . $filename,
        ]);

        

        return redirect()->route('DataKaryawan.index');


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
        $departemen = DataDepartemen::all();
        $data = DataKaryawan::where('id_karyawan', $id)->first();
    
   
        // Atau gunakan pagination: User::paginate(10);
        return Inertia::render(
            'User/EditDataKaryawan', [
            'Karyawan' => $data,
            'Departemen' => $departemen
            ],
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $item = DataKaryawan::findOrFail($id);
        $request->validate([
            'id_departemen' => 'required',
            'kode_karyawan' => 'required|string|max:255',
            'nama_karyawan' => 'required|string|max:255',
            'no_hp' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'sekolah' => 'required|string|max:255',
            'jurusan' => 'required|string|max:255',
            'linkmedsos' => 'required|string|max:255',
            'dokumen' => 'required|string|max:255',
        ],
    );


        
        $departemen = DataDepartemen::where('id_departemen', $request->id_departemen)->first();
     
        $item->id_departemen = $request->id_departemen;
        $item->departemen = $departemen->nama_departemen;
        $item->nama_karyawan = $request->nama_karyawan;
        $item->no_hp = $request->no_hp;
        $item->alamat = $request->alamat;
        $item->email = $request->email;
        $item->sekolah = $request->sekolah;
        $item->jurusan = $request->jurusan;
        $item->linkmedsos = $request->linkmedsos;
        $item->dokumen =$request->dokumen;
    
         $item->save();
       

        return redirect()->route('DataKaryawan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $post = DataKaryawan::findOrFail($id);
        $post->delete();
    
        return redirect()->back()->with('success', 'deleted successfully.');
    }
}
