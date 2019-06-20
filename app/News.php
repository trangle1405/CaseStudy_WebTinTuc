<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $table = 'news';
    protected $fillable = [
        'title', 'title_slug', 'summary', 'content', 'image', 'featured_news','view', 'typeOfNews_id'
    ];

    public function TypeOfNews(){
        return $this->belongsTo('App\TypeOfNews', 'typeOfNews_id','id');
    }

    public function Comment(){
        return $this->hasMany('App\Comment', 'news_id', 'id');
    }

}
