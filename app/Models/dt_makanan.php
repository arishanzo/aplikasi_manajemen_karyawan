<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dt_makanan extends Model
{
    use HasFactory;

    
    protected $table = 'dt_makanans'; // Nama tabel di database
    protected $primaryKey = 'id_makanan'; // Nama kolom primary key

    public function profil()
    {
        return $this->belongsTo(dt_profil::class, 'id_profil', 'id_profil'); // Relasi Many-to-One
    }

    
    public function order()
    {
        return $this->hasMany(dt_order::class, 'id_makanan'); // Relasi One-to-Many
    }

    protected $fillable = [
        'id_profil',
        'id_user',
        'makanan',
        'jenis_makanan',
        'deskripsi',
        'foto',
        'harga',
    ];

 
}
