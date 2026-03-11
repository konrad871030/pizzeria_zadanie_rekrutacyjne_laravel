<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'menu_item_id',
        'quantity',
        'total_price',
        'status',
        'email',
        'delivery_address',
    ];

    public function menuItem()
    {
        return $this->belongsTo(MenuItem::class);
    }
}
