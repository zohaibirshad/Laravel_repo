<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class profileimage extends Model
{
    public function users()
{
    return $this->hasone('App\profileimage');
}
}
