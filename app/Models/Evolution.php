<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Evolution extends Model
{
    use SoftDeletes;

    protected $table = 'evolutions';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
       'patient_id', 
       'evolution_date',
       'initial_blood_pressure', 
       'final_blood_pressure',
       'o2_saturation',
       'observation'
       
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }
    
}
