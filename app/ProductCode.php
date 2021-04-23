<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCode extends Model
{

    protected $table ='product_codes';
    protected $fillable = ['pc_prefix', 'pc_description', 'pc_size', 'pc_code'];
}
