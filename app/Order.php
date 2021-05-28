<?php

namespace App;

use NumberFormatter;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{


    protected $fillable = ["order_number"];

    public function items()
    {
        return $this->belongsToMany(Product::class, 'order_items', 'order_id', 'product_id')->withPivot('product_description','quantity', 'price');
        return $this->belongsToMany(Product::class, '');
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function orderItems()
    {
        return $this->belongsToMany(Product::class)->withPivot('qty','total');
    }

    //  /**
    //      * Get the product's price.
    //      *
    //      * @param  string  $value
    //      * @return string
    //      */
    //     public function getGrandTotalAttribute($value)
    //     {
    //         $fmt = new NumberFormatter( 'en_PHP', NumberFormatter::CURRENCY );
    //         return $fmt->formatCurrency($value, 'PHP');
    //         // return number_format($value,  2, '.', ' ');
    //     }
}
