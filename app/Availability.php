<?php

namespace App;

use App\Contract\AvailabilityInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Availability
 * @package App
 */
class Availability extends Model implements AvailabilityInterface
{
    /**
     * @var array
     */
    protected $fillable = ['day'];

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cook()
    {
        return $this->belongsTo(Cook::class);
    }

    /**
     * @return mixed
     */
    public function getCook()
    {
        return $this->cook()->first();
    }

    /**
     * @return mixed
     */
    public function getDayName()
    {
        return jddayofweek($this->getDay(), 1);
    }

    /**
     * @return mixed
     */
    public function getDayNameAttribute()
    {
        return $this->getDayName();
    }

    /**
     * @return mixed
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function cookingRequests()
    {
        return $this->hasMany(CookingRequest::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCookingRequests()
    {
        return $this->cookingRequests()->get();
    }

    /**
     * @return mixed
     */
    public function getApprovedCookingRequest()
    {
        return $this->cookingRequests()->approved()->first();
    }

    public function hasApprovedCookingRequest()
    {
        return $this->cookingRequests()->approved()->count() > 0;
    }

    /**
     * @param $query
     * @param $day
     * @return mixed
     */
    public function scopeDay($query, $day)
    {
        return $query->where('day', $day);
    }
}
