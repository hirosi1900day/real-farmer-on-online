<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_Request extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
