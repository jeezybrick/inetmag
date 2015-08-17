<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    protected $table = 'comments';

    protected $fillable = ['name','comment','user_id','notebook_id'];
    
     public function user()
    {

        return $this->belongsTo('App\User');

    }
    
     public function product()
    {

        return $this->belongsTo('App\Notebook');

    }


    public function replyOfComments(){

        return $this->hasMany('App\ReplyOfComment');

    }
}
