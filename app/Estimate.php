<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
    protected $table ='estimates';
    protected $fillable = ['mat_name', 'mat_value', 'mat_value_sg', 'mat_scent','mat_water','total_liters'];
}
