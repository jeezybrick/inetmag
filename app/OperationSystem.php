<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OperationSystem extends Model
{


    public function notebook()
    {

        return $this->hasMany('App\Notebook', 'os');

    }
}
