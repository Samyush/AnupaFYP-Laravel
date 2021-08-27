<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';


    protected $fillable = [
        'name', 'details', 'status', 'grand_total', 'item_count', 'notes', 'tables_id'
    ];

    public function table()
    {
        return $this->belongsTo(Table::class, 'tables_id');
    }

    public function items()
    {
        return $this->hasMany('App\Models\OrderItem');
    }
}
