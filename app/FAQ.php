<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FAQ extends Model
{
    protected $table ='faq';
    protected $fillable = ['category', 'title', 'description', 'icon', 'created_at', 'updated_at'];
}
