<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataHadir extends Model
{
    use HasFactory;

    protected $table = 'data_hadirs'; 
    protected $primaryKey = 'id_hadir'; 

    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id'); 
    }

    public function karyawan()
    {
        return $this->belongsTo(DataKaryawan::class, 'kode_karyawan', 'kode_karyawan'); 
    }

    protected static function booted()
    {
        static::created(function ($datahadir) {
            Audit::create([
                'action' => 'created',
                'model' => 'Data Hadir',
                'model_id' => $datahadir->id_hadir,
                'user_id' => auth()->id(),
                'new_data' => $datahadir->getAttributes(),
            ]);
        });

        static::updated(function ($datahadir) {
            $oldData = $datahadir->getOriginal();
            $newData = $datahadir->getAttributes();

            Audit::create([
                'action' => 'updated',
                'model' => 'Data Hadir',
                'model_id' => $datahadir->id_hadir,
                'user_id' => auth()->id(),
                'old_data' => $oldData,
                'new_data' => $newData,
            ]);
        });

        static::deleted(function ($datahadir) {
            $oldData = $datahadir->getOriginal();

            Audit::create([
                'action' => 'deleted',
                'model' => 'Data Hadir',
                'model_id' => $datahadir->id_hadir,
                'user_id' => auth()->id(),
                'old_data' => $oldData,
                'new_data' => null, 
            ]);
        });
    }

    protected $fillable = [
        'id_hadir',
        'id',
        'kode_karyawan',
        'tgl_hadir',
        'status',
        'keterangan'
    ];

   
}
