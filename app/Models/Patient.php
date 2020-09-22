<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

class Patient extends Model
{
  
    protected $table = 'patients';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id', 'name', 'rg', 'cpf', 'email', 'birth_date'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function phone()
    {
        return $this->hasMany(Phone::class);
    }

    public function address()
    {
        return $this->hasMany(Address::class);
    }

}
