<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    public function roles () {
        $this->belongsToMany('App\Role');
    }
}
