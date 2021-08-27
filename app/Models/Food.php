<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    use HasFactory;

    protected $table = 'food';
    protected $fillable = [
        'name', 'details', 'status', 'price', 'discount_price', 'quantity', 'image', 'categoris_id'
    ];

    public function category() {
        return$this->belongsTo(Categori::class, 'categoris_id');
    }
}
