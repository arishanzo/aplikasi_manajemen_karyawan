<?php

use App\Exports\HadirExport;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Home\HomeController;
use App\Http\Controllers\Manajemen\DataDepartemenController;
use App\Http\Controllers\Manajemen\ManajemenController;
use App\Http\Controllers\User\DataDiriController;
use App\Http\Controllers\User\DataHadirController;
use App\Http\Controllers\User\DataKaryawanController;
use App\Http\Controllers\User\UserController;
use App\Exports\UsersExport;
use App\Http\Controllers\Histori\AuditController;
use App\Http\Controllers\Manajemen\ExcelImportController;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\DataDepartemen;
use App\Models\DataHadir;
use App\Models\DataKaryawan;
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



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    return redirect(auth()->user()->role === 'merchaint' ? '/manajemen' : '/user');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth'])->group(function () {
    Route::get('/manajemen', [ManajemenController::class, 'index'])->name('manajemen.dasboard');
    Route::resource('DataDepartemen', DataDepartemenController::class);

    Route::get('/users/export', function () {
        return Excel::download(new HadirExport, 'daftarhadir.xlsx');
    })->name('datahadir.export');

    Route::resource('HistoryAudit', AuditController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.dasboard');
    
    Route::resource('DataKaryawan', DataKaryawanController::class);
    Route::resource('DataHadir', DataHadirController::class);
 

Route::post('/excelimport', [ExcelImportController::class, 'import'])->name('datakaryawan.import');

  
});




require __DIR__.'/auth.php';
