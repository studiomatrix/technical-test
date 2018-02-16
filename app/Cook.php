<?php

namespace App;

use App\Contract\CookInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Cook
 * @package App
 */
class Cook extends Model implements CookInterface
{
    /**
     * @var array
     */
    protected $guarded = [];

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
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function availabilities()
    {
        return $this->hasMany(Availability::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAvailabilities()
    {
        return $this->availabilities()->get();
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

    public function hasCookingRequestForDay($day)
    {
        $availability = $this->availabilities()->day($day)->first();
        return $availability->cookingRequests()->approved()->count() > 0;
    }
}
