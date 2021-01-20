<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminChatroom extends Model
{
    protected $fillable = [
        'user_id','admin_user_id'
    ];
     public function message(){
        return $this->hasMany(AdminChatmessage::class);
    }
}
