<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class faq_category extends Model
{
    protected $table = ['faq_categories'];
    protected $fillable = ['cat_name','cat_description','created_at', 'updated_at'];

    // public function getDetails(){
    //     return $this->hasMany(faq_details::class, 'category_id','id');
    // }
}
