<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $guarded = [];

    public function customer(){
    	return $this->belongsTo('App\Models\Customer');
    }

    public function product_types(){
        return $this->belongsTo('App\Models\ProductType','product_type_id');
    }
    
}
