<?php

namespace App\Exports;

use App\Models\DataKaryawan;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class KaryawanExport implements ToModel, WithHeadingRow
{
    /**
    * @return \Illuminate\Support\Collection
    */
  
    public function model(array $row)
    {
        return new DataKaryawan([
            'id_departemen' => $row['id_departemen'],    
            'id' => $row['id'],        
            'kode_karyawan' => $row['kode_karyawan'],  
            'departemen' => $row['departemen'],
            'nama_karyawan' => $row['nama_karyawan'],
            'no_hp' => $row['no_hp'],
            'alamat' => $row['alamat'],
            'email' => $row['email'],
            'sekolah' => $row['sekolah'],
            'jurusan' => $row['jurusan'],
            'linkmedsos' => $row['linkmedsos'],
            'dokumen' => $row['dokumen'],
        ]);
    }
}
