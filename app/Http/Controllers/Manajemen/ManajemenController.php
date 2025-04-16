<?php

namespace App\Http\Controllers\Manajemen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ManajemenController extends Controller
{
    
    public function index()
    {
        return Inertia::render('Manajemen/Dashboard');
    }
}
