<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminChatmessage extends Model
{
      protected $fillable = ['admin_chatroom_id', 'user_id','admin_user_id','messages'];
}
