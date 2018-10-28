<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Therapist extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'therapist';
    
    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
