<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Type extends Model
{
    public function tasks()
    {
        return $this->hasMany(Task::class);
    }
}
