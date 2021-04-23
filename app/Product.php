<?php

namespace App;

use NumberFormatter;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{


    protected $fillable = ['name','description','product_code','product_capacity','quantity','price','img_url'];


    //  /**
    //      * Get the product's price.
    //      *
    //      * @param  string  $value
    //      * @return string
    //      */
    //     public function getPriceAttribute($value)
    //     {
    //         $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
    //         return $fmt->formatCurrency($value, 'PHP');
    //         // return number_format($value,  2, '.', ' ');
    //     }


    public function inventories(){
        return $this->hasMany(Inventory::class);
    }
}
