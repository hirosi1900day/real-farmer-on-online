<?php

namespace App;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;



class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     
   
    
    protected $fillable = [
        'name', 'email', 'password','image_location','plan','point','address','self_introduce','postal_code','telphone_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function agricultualHistories()
    {
        return $this->hasMany(AgricultualHistory::class);
    }
    public function fields()
    {
        return $this->hasMany(Field::class);
    }
    public function requests()
    {
        return $this->hasMany(Request::class);
    }
    
    
}
