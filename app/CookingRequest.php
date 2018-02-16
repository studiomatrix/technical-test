<?php

namespace App;

use App\Contract\CookingRequestInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class CookingRequest
 * @package App
 */
class CookingRequest extends Model implements CookingRequestInterface
{
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cook()
    {
        return $this->belongsTo(Cook::class);
    }

    public function availability()
    {
        return $this->belongsTo(Availability::class);
    }

    public function approveRequest()
    {
        return $this->update(['approved' => true]);
    }

    public function unapproveRequest()
    {
        return $this->update(['approved' => false]);
    }

    public function scopeApproved($query)
    {
        return $query->where('approved', 1);
    }

    public function scopeUnapproved($query)
    {
        return $query->where('approved', 0);
    }
}
