<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TypeOfNews extends Model
{
    protected $table = 'typeOfNews';
    protected $fillable = [
        'name', 'name_slug', 'category_id'
    ];

    public function Category()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');

    }

    public function News(){
        return $this->hasMany('App\News', 'typeOfNews', 'id');
    }
}
