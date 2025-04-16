<?php

namespace App\Exports;

use App\Models\DataHadir;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class HadirExport implements FromCollection, WithHeadings, WithMapping
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DataHadir::with(['karyawan'])->get(); 
    }
        public function headings(): array
    {
        return [
            'Nama Lengkap',
            'Departemen',
            'Tanggal',
            'Status',
            'Keterangan',
        ];
    }

    public function map($hadir): array
    {
        return [
            $hadir->karyawan->nama_karyawan,
            $hadir->karyawan->departemen,
            $hadir->tgl_hadir,
            $hadir->status,
            $hadir->keterangan
        ];
    }
    
};
