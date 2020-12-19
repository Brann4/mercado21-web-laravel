<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';

    public function orders()
    {
        return $this->hasMany('App\Models\Order', 'customer_id');
    }
}
