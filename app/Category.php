<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name', 'name_slug',
    ];
    public function TypeOfNews(){
        return $this->hasMany('App\TypeOfNews', 'category_id', 'id');
    }

    public function News(){
        return $this->hasManyThrough('App\News', 'App\TypeOfNews', 'category_id', 'typeOfNews_id', 'id');
    }

}
