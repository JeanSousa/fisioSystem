<?php

namespace App;

use App\Models\Patient;
use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements JWTSubject
{
    use HasApiTokens, Notifiable;

    //appends links permite que envie links dinamicos na api
    //vai fazer buscar a function getlinkAttribute dentro do model e retornar junto a collection
    //o underline mostra que é hipermídia
    protected $appends = ['_links'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'photo', 'crefito'
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


    public function patient()
    {
        return $this->hasMany(Patient::class);
    }

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }


    public function getLinksAttribute()
    {
        return [
           'href' => route('users.show', $this->id),
           'rel' => 'Users'
        ];
    }
}
