<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comment';
    protected $fillable = [
        'content', 'user_id', 'news_id'
    ];
    public function News(){
        return $this->belongsTo('App\News', 'news_id', 'id');
    }

    public function User(){
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
