<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title','content', 'author_id'];

    public function comments(){
        return $this->morphMany(Comment::class, 'comment_table');
    }

    public function author(){
        return $this->belongsTo(Customer::class, 'author_id');
    }
}
