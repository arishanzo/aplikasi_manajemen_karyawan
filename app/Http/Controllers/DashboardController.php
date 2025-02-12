<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user();

             if ($user->role === 'merchaint') {
                return redirect('/merchaint');
            } else {
                return redirect('/company');
            } 

    }
}
