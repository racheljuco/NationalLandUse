<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livestock extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'livestocks';

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
                  'type_livestock_id',
                  'name',
                  'description'
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
     * Get the TypeLivestock for this model.
     */
    public function LivestockType()
    {
        return $this->belongsTo('App\Models\LivestockType','type_livestock_id','id');
    }

    /**
     * Get the landUsePlanLivestock for this model.
     */
    public function landUsePlanLivestock()
    {
        return $this->belongsToMany('App\Models\LandUsePlanLivestock','livestock_id','id');
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

}
