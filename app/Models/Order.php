<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id',
        'ammount',
        'status',
        'stripe_id',
    ];
    public function products()
    {
        return $this->hasMany(OrderProduct::class);
    }
}
