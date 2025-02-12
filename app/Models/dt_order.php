<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class dt_order extends Model
{
    use HasFactory;

    
    
    protected $table = 'dt_orders'; // Nama tabel di database
    protected $primaryKey = 'id_order'; // Nama kolom primary key

   
    public function makanan()
    {
        return $this->belongsTo(dt_makanan::class, 'id_makanan', 'id_makanan'); // Relasi Many-to-One
    }


    public static function generateOrderNumber()
    {
        $date = now()->format('Ymd');
        $lastOrder = self::whereDate('created_at', now()->toDateString())->latest()->first();

        $lastNumber = $lastOrder ? (int)substr($lastOrder->order_number, -4) : 0;
        $newNumber = str_pad($lastNumber + 1, 4, '0', STR_PAD_LEFT);

        return "ORD{$date}{$newNumber}";
    }

    protected $fillable = [
        'id_user',
        'id_makanan',
        'jumlah_porsi',
        'tgl_pengiriman',
        'nama_pembeli',
        'nama_katering',
        'no_order',
    ];

}
