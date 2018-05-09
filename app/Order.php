<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'user_details_id', 'status', 'email'
    ];

    /*
     * Statuses:
     * 1 - Order made
     * 2 - Order sent
     * 3 - Order cancelled
     * 4 - Order completed
     * */

    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders_products')->withPivot('quantity', 'price');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function user_details()
    {
        return $this->hasOne(UserDetails::class, 'id');
    }
}
