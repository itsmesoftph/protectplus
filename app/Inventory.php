<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{

    protected $table ='inventory';
    protected $fillable = ['product_id', 'user_id', 'cur_qty', 'new_qty'];

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
