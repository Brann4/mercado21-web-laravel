<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'product_id';

    public function restaurant()
    {
        return $this->belongsTo('App\Models\Restaurant', 'restaurant_id');
    }
}
