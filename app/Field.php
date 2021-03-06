<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = ['adminField_id','complete'];
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function dailies()
    {
        return $this->hasMany(Daily::class);
    }
    public function plants()
    {
        return $this->hasMany(Plant::class);
    }
    public function instructions()
    {
        return $this->hasMany(User_instruction::class);
    }
    public function admin_field(){
        return $this->hasOne(AdminField::class);
    }
}
