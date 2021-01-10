<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Daily extends Model
{
    protected $fillable = ['content','gallary','plantType_id'];
    
    public function field()
    {
        return $this->belongsTo(Field::class);
    }
}
