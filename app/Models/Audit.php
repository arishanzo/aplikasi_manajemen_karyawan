<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;

    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    
    protected $fillable = [
        'action', 'model', 'model_id', 'user_id', 'old_data', 'new_data'
    ];

    protected $casts = [
        'old_data' => 'array',
        'new_data' => 'array',
    ];
}
