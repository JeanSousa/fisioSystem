<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes;
  
    protected $table = 'patients';


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'user_id', 'name', 'rg', 'cpf', 'email', 'birth_date', 'photo',
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

    public function evolution()
    {
        return $this->hasMany(Evolution::class);
    }

}
