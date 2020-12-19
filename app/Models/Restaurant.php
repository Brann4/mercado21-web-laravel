<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'restaurants';
    protected $primaryKey = 'restaurant_id';

    public function products()
    {
        return $this->hasMany('App\Models\Product', 'restaurant_id');
    }
}
