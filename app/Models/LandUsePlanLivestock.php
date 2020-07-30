<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandUsePlanLivestock extends Model
{
    
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'land_use_plan_livestocks';

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
                  'livestock_id'
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
     * Get the Livestock for this model.
     */
    public function Livestock()
    {
        return $this->belongsTo('App\Models\Livestock','livestock_id','id');
    }



}
