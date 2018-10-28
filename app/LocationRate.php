<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocationRate extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'location_rate';
    
    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
