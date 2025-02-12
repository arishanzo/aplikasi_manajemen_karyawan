<?php

namespace App\Http\Controllers;

use App\Models\dt_makanan;
use App\Models\dt_order;
use App\Models\dt_profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;


class CompanyController extends Controller
{
    
    public function index(Request $request)
    {
        $search = $request->query('search', '');
        
    

        $data = dt_makanan::query()->join('dt_profils', 'dt_makanans.id_profil', '=', 'dt_profils.id_profil')
        ->where('dt_makanans.makanan', 'like', "%$search%")
        ->orWhere('dt_makanans.jenis_makanan', 'like', "%$search%")->orwhere('dt_profils.alamat', 'like', "%$search%")
        ->get();
    
        return Inertia::render('Company/Dashboard', [
            'Makanan' => $data,
            'search' => $search,
            ], );
    }

    public function create( $id)
    {
        $data = dt_makanan::with(['profil'])->findOrFail($id);
       
     
        return Inertia::render('Company/create',  [
            'Makanan' => $data
            ]);

    }


    public function store(Request $request)
    {
        $request->validate([
            
            'id_makanan' => 'required',
            'jumlah_porsi' => 'required|integer',
            'tgl_pengiriman' => 'required|date|max:12',
            'nama_katering' => 'required|string|max:225',
        ]);

        $user = Auth::user();

        dt_order::create([
            'id_user' => $user->id,
            'id_makanan' => $request->id_makanan,
            'jumlah_porsi' => $request->jumlah_porsi,
            'tgl_pengiriman' => $request->tgl_pengiriman,
            'nama_pembeli' => $user->name,
             'nama_katering' => $request->nama_katering,
            'no_order' => dt_order::generateOrderNumber(),
        ]);
      
        return redirect()->route('company.dasboard');
    }


    public function order()
    {

        $user = Auth::user();
       
        $data = dt_order::with(['makanan'])->where('id_user', $user->id)->get();

        // Atau gunakan pagination: User::paginate(10);
        return Inertia::render(
            'Company/order', [
            'Order' => $data
            ],
        );
    }
}
