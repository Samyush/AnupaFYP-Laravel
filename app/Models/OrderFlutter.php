<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderFlutter extends Model
{
    use HasFactory;

    protected $fillable = [
        'orderNo', 'foodName', 'quantity', 'bill', 'tables_id'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class, 'tables_id');
    }
}
