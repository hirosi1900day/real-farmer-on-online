<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plant extends Model
{
      protected $fillable = ['plantType_id','gallary'];
      
      public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
