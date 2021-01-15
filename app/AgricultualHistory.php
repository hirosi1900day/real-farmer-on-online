<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AgricultualHistory extends Model
{
    protected $fillable = ['contet'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
