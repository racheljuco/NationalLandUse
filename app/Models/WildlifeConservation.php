<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WildlifeConservation extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'wildlife_conservation';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    public $incrementing = false;


    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'land_use_plan_id',
                  'village_id',
                  'wildlife_id',
                  'name_division',
                  'name_ward',
                  'wildlife_conservation_type',
                  'wildlife_conservation_name',
                  'specie_available_name',
                  'total_number_species_available'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    
    /**
     * Get the LandUsePlan for this model.
     */
    public function LandUsePlan()
    {
        return $this->belongsTo('App\Models\LandUsePlan','land_use_plan_id','id');
    }

    /**
     * Get the Village for this model.
     */
    public function Village()
    {
        return $this->belongsTo('App\Models\Village','village_id','id');
    }

    /**
     * Get the wildlifefor this model.
     */
    public function Wildlife()
    {
        return $this->belongsTo('App\Models\Wildlife','wildlife_id','id');
    }


    /**
     * Get created_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getCreatedAtAttribute($value)
    {
        return date('j/n/Y g:i A', strtotime($value));
    }

    /**
     * Get updated_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getUpdatedAtAttribute($value)
    {
        return date('j/n/Y g:i A', strtotime($value));
    }

}
