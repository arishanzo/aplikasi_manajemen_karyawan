<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDepartemen extends Model
{
    use HasFactory;

    protected $table = 'data_departemens'; 
    protected $primaryKey = 'id_departemen'; 

   

    protected $fillable = [
        'id_departemen',
        'kode_departemen',
        'nama_departemen'
    ];

    
    protected static function booted()
    { 
        
        static::created(function ($datadepartemen) {
        Audit::create([
            'action' => 'created',
            'model' => 'Data  Departemen',
            'model_id' => $datadepartemen->id_departemen,
            'user_id' => auth()->id(), 
            'new_data' => $datadepartemen->getAttributes(),
        ]);
    });

    static::updated(function ($datadepartemen) {
        $oldData = $datadepartemen->getOriginal();
        $newData = $datadepartemen->getAttributes();

        Audit::create([
            'action' => 'updated',
            'model' => 'Data Departemen',
            'model_id' => $datadepartemen->id_departemen,
            'user_id' => auth()->id(),
            'old_data' => $oldData,
            'new_data' => $newData,
        ]);
    });

    static::deleted(function ($datadepartemen) {
        $oldData = $datadepartemen->getOriginal();

        Audit::create([
            'action' => 'deleted',
            'model' => 'Data Departemen',
            'model_id' => $datadepartemen->id_departemen,
            'user_id' => auth()->id(),
            'old_data' => $oldData,
            'new_data' => null, // Data sudah dihapus
        ]);
    });
}

}
