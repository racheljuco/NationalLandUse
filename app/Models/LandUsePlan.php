<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LandUsePlan extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'land_use_plans';

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
                  'village_id',
                  'land_use_plan_status_id',
                  'name',
                  'description',
                  'created_date',
                  'status',
                  'file'
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
     * Get the Village for this model.
     */
    public function Village()
    {
        return $this->belongsTo('App\Models\Village','village_id','id');
    }

    /**
     * Get the LandUsePlanStatus for this model.
     */
    public function LandUsePlanStatus()
    {
        return $this->belongsTo('App\Models\LandUsePlanStatus','land_use_plan_status_id','id');
    }

    /**
     * Get the gazette for this model.
     */
    public function gazette()
    {
        return $this->hasOne('App\Models\Gazette','land_use_plan_id','id');
    }

    /**
     * Get the landUseDistribution for this model.
     */
    public function landUseDistribution()
    {
        return $this->hasOne('App\Models\LandUseDistribution','land_use_plan_id','id');
    }

    /**
     * Get the shapefile for this model.
     */
    public function shapefile()
    {
        return $this->hasOne('App\Models\ShapeFile','land_use_plan_id','id');
    }

     /**
     * Get the IrrigatedPotentialArea for this model.
     */
    public function irrigatedPotentialArea()
    {
        return $this->hasOne('App\Models\IrrigatedPotentialArea','land_use_plan_id','id');
    }


    /**
     * Get deleted_at in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getDeletedAtAttribute($value)
    {
        return date('j/n/Y g:i A', strtotime($value));
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

    public function crops(){

        return $this->belongsToMany('App\Models\Crop','land_use_plan_crops', 'land_use_plan_id','crop_id');
        // return $this->belongsToMany('App\Crop','land_use_plan_crops', 'land_use_plan_id', 'crop_id');

    }
    public function farming_methods(){

        return $this->belongsToMany('App\Models\FarmingMethod','land_use_plan_farming_methods', 'land_use_plan_id','farming_method_id');
        // return $this->belongsToMany('App\Crop','land_use_plan_crops', 'land_use_plan_id', 'crop_id');

    }
    public function farming_practices(){

        return $this->belongsToMany('App\Models\FarmingPractice','land_use_plan_farming_practice', 'land_use_plan_id','farming_practice_id');
        // return $this->belongsToMany('App\Crop','land_use_plan_crops', 'land_use_plan_id', 'crop_id');

    }

    public function farming_techniques(){

        return $this->belongsToMany('App\Models\FarmingTechnique','land_use_plan_farming_technique', 'land_use_plan_id','farming_technique_id');
        // return $this->belongsToMany('App\Crop','land_use_plan_crops', 'land_use_plan_id', 'crop_id');

    }
    public function farm_inputs(){

        return $this->hasMany('App\Models\LandUsePlanFarmInput', 'land_use_plan_id','id');
        // return $this->belongsToMany('App\Crop','land_use_plan_crops', 'land_use_plan_id', 'crop_id');

    }
    
    //Livestocks
    public function livestocks(){

        return $this->belongsToMany('App\Models\Livestock','land_use_plan_livestocks', 'land_use_plan_id','livestock_id');
        // return $this->belongsToMany('App\Crop','land_use_plan_crops', 'land_use_plan_id', 'crop_id');

    }

   public function fishs(){

        return $this->belongsToMany('App\Models\Fish','land_use_plan_fishs', 'land_use_plan_id','fish_id');
        // return $this->belongsToMany('App\Crop','land_use_plan_crops', 'land_use_plan_id', 'crop_id');

    }

    //Wildlifes
    public function wildlifes(){

        return $this->belongsToMany('App\Models\Wildlife','land_use_plan_wildlifes', 'land_use_plan_id','wildlife_id');
        // return $this->belongsToMany('App\Crop','land_use_plan_crops', 'land_use_plan_id', 'crop_id');

    }

    //Minerals
    public function minerals(){

        return $this->belongsToMany('App\Models\Mineral','land_use_plan_minerals', 'land_use_plan_id','mineral_id');
        // return $this->belongsToMany('App\Crop','land_use_plan_crops', 'land_use_plan_id', 'crop_id');

    }

}
