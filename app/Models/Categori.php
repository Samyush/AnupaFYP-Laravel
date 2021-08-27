<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categori extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'details', 'status', 'image'
    ];

    public function food() {
        return $this->hasMany(Food::class, 'categoris_id');
    }
}
