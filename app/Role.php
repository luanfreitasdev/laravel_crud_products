<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public function users () {
        $this->belongsToMany('App\User');
    }
    public function resources()
    {
        return $this->belongsToMany(Resource::class);
    }
}
