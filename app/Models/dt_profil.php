<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dt_profil extends Model
{ 
    
    use HasFactory;

     
    protected $table = 'dt_profils'; // Nama tabel di database
    protected $primaryKey = 'id_profil'; // Nama kolom primary key


    public function makanan()
    {
        return $this->hasMany(dt_makanan::class, 'id_profil'); // Relasi One-to-Many
    }

    public function order()
    {
        return $this->hasMany(dt_order::class, 'id_profil'); // Relasi One-to-Many
    }

    
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user', 'id_user'); // Relasi Many-to-One
    }

    protected $fillable = [
        'id_user',
        'nama_perusahaan',
        'alamat',
        'kontak',
        'deskripsi_perusahaan',
    ]; 
    
}
