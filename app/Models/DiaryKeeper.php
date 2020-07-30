<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiaryKeeper extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'diary_keeper';

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
                  'ward_id',
                  'village_id',
                  'livestock_id',
                  'number_of_livestock',
                  'diary_farm_name'
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
    public function Ward()
    {
        return $this->belongsTo('App\Models\Ward','ward_id','id');
    }
    /**
     * Get the Village for this model.
     */
    public function Village()
    {
        return $this->belongsTo('App\Models\Village','village_id','id');
    }

    /**
     * Get the Livestockfor this model.
     */
    public function Livestock()
    {
        return $this->belongsTo('App\Models\Livestock','livestock_id','id');
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
