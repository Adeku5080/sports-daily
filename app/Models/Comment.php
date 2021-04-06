<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'content', 'post_id'];


    public function post(){
        $this->belongsTo('App\Models\Post');
    }

    public function user(){

        $this->belongsTo('App\Models\User');
    }

}
