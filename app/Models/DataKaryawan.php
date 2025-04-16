<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataKaryawan extends Model
{
    use HasFactory;

    protected $table = 'data_karyawans';
    protected $primaryKey = 'id_karyawan'; 

    public function departemen()
    {
        return $this->belongsTo(DataDepartemen::class, 'id_departemen', 'id_departemen'); 
    }


    public function datahadir()
    {
        return $this->hasMany(DataHadir::class, 'kode_karyawan', 'kode_karyawan'); 
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'id', 'id');
    }


    protected static function booted()
    { 
        
        static::created(function ($datakaryawan) {
        Audit::create([
            'action' => 'created',
            'model' => 'Data Karyawan',
            'model_id' => $datakaryawan->id_karyawan,
            'user_id' => auth()->id(),
            'new_data' => $datakaryawan->getAttributes(),
        ]);
    });

    static::updated(function ($datakaryawan) {
        $oldData = $datakaryawan->getOriginal();
        $newData = $datakaryawan->getAttributes();

        Audit::create([
            'action' => 'updated',
            'model' => 'Data Karyawan',
            'model_id' => $datakaryawan->id_karyawan,
            'user_id' => auth()->id(),
            'old_data' => $oldData,
            'new_data' => $newData,
        ]);
    });

    static::deleted(function ($datakaryawan) {
        $oldData = $datakaryawan->getOriginal();

        Audit::create([
            'action' => 'deleted',
            'model' => 'Data Karyawan',
            'model_id' => $datakaryawan->id_karyawan,
            'user_id' => auth()->id(),
            'old_data' => $oldData,
            'new_data' => null, 
        ]);
    });
}


    protected $fillable = [
        'id_karyawan',
        'id_departemen',
        'id',
        'kode_karyawan',
        'departemen',
        'nama_karyawan',
        'no_hp',
        'alamat',
        'email',
        'sekolah',
        'jurusan',
        'linkmedsos',
        'dokumen'
    ];


}
