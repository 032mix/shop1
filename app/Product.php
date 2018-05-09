<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'sub_category_id', 'price', 'quantity'];

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getRouteKeyName()
    {
        return 'name';
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_products')->withPivot('quantity');
    }
}
