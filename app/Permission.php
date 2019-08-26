<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\This;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Permission extends Model
{
   
    public function users()
    {
        return $this->belongsToMany('App\User','App\user_permission');
    }
    
}