<?php

namespace App\Http\Controllers;

use App\Models\dt_makanan;
use App\Models\dt_order;
use App\Models\dt_profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class MerchaintController extends Controller
{
    public function index()
    {
        return Inertia::render('Merchaint/Dashboard');
    }

    
    public function order()
    {

       
        $data = dt_order::with(['makanan'])->get();
  // Atau gunakan pagination: User::paginate(10);
        return Inertia::render(
            'Merchaint/order', [
            'Order' => $data
            ],
        );
    }
}
