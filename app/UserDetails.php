<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetails extends Model
{
    protected $fillable = [
        'first_name', 'last_name', 'address', 'phone_num', 'user_id'
    ];

    public function order()
    {
        return $this->hasOne(Order::class);
    }
}
