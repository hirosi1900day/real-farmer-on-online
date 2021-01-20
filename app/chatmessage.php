<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class chatmessage extends Model
{
     protected $fillable = [
        'user_id','messages'
    ];
    
    public function user(){
         return $this->hasMany(User::class);
    }
}
