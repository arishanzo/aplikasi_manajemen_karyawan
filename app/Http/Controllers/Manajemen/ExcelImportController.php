<?php

namespace App\Http\Controllers\Manajemen;

use App\Exports\KaryawanExport;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ExcelImportController extends Controller
{
    public function import(Request $request)
{
    $request->validate([
        'file' => 'required|file|mimes:xlsx,xls,csv',
    ]);

    $path = $request->file('file')->store('temp');
    Excel::import(new KaryawanExport, storage_path("app/{$path}"));
    unlink(storage_path("app/{$path}"));

    return back()->with('message', 'Import berhasil!');
}
}
