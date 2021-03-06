<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Phone extends Model
{
    protected $table = 'phones';

    protected $fillable = ['phone', 'mobile_phone'];


    public function patients()
    {
        return $this->belongsTo(Patient::class);
    }
}
