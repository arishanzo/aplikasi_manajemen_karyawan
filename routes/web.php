<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Merchaint\MakananController;
use App\Http\Controllers\Merchaint\ProfilController;
use App\Http\Controllers\MerchaintController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Psy\Readline\Libedit;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return redirect(auth()->user()->role === 'merchaint' ? '/merchaint' : '/company');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/merchaint', [MerchaintController::class, 'index'])->name('merchaint.dasboard');
    Route::resource('profil', ProfilController::class);
    Route::resource('makanan', MakananController::class);
    Route::get('/merchaint/order', [MerchaintController::class, 'order'])->name('merchaint.order');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/company', [CompanyController::class, 'index'])->name('company.dasboard');
    
    Route::get('/company/create/{id}', [CompanyController::class, 'create'])->name('company.create');
    
    Route::put('/company/store', [CompanyController::class, 'store'])->name('company.store');

    Route::get('/company/order', [CompanyController::class, 'order'])->name('company.order');

  
});


    // Route::get('/lihatkelas', [LihatkelasController::class, 'index'])->name('lihatkelas');
    // Route::get('/Buatkelas', [KelasController::class, 'index'])->name('Buatkelas');
    // Route::get('/tambahkelas', [KelasController::class, 'halamankelas'])->name('kelas.create');
    // Route::put('/updatekelas/{id_kelas}', [KelasController::class, 'updatekelas'])->name('kelas.update');
    // Route::post('/kelas', [KelasController::class, 'store'])->name('kelas.store');
    // Route::get('/editkelas/{id_kelas}', [KelasController::class, 'edit'])->name('kelas.edit');
    // Route::delete('/kelas/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy');



require __DIR__.'/auth.php';
