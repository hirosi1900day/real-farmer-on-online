<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_instruction extends Model
{
    protected $fillable = ['complete','instruction_id'];
    
    public function field()
    {
        return $this->belongsTo(Field::class);
    }
    public function instructions(){
         return $this->belongsTo(Instruction::class);
    }
    
}
