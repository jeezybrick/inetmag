<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public static $count = 1;

    public static function getCount(){
      return static::$count;
    }

    public static function setCount($count){
        static::$count = $count;
        return static::$count++;
    }



}
