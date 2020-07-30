<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gazette extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'gazette';

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
                  'gn_number',
                  'title',
                  'published_date',
                  'expired_date'
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
     * Set the published_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setPublishedDateAttribute($value)
    {
        $this->attributes['published_date'] = !empty($value) ? date($this->getDateFormat(), strtotime($value)) : null;
    }

    /**
     * Set the expired_date.
     *
     * @param  string  $value
     * @return void
     */
    public function setExpiredDateAttribute($value)
    {
        $this->attributes['expired_date'] = !empty($value) ? date($this->getDateFormat(), strtotime($value)) : null;
    }

    /**
     * Get published_date in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getPublishedDateAttribute($value)
    {
        return date('j/n/Y', strtotime($value));
    }

    /**
     * Get expired_date in array format
     *
     * @param  string  $value
     * @return array
     */
    public function getExpiredDateAttribute($value)
    {
        return date('j/n/Y', strtotime($value));
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
