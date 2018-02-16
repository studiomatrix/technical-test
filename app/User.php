<?php

namespace App;

use App\Contract\UserInterface;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * Class User
 * @package App
 */
class User extends Authenticatable implements UserInterface
{
    use Notifiable;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'role'
    ];

    /**
     * @param $role
     * @return bool
     */
    public function hasRole($role)
    {
        return $this->role == $role;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param $role
     */
    public function setRole($role)
    {
        $this->update(['role' => $role]);
    }

    /**
     * @todo scaffold this scope
     *
     * @param $query
     */
    public function scopeRole($query)
    {
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function cook()
    {
        return $this->hasOne(Cook::class);
    }

    /**
     * @return mixed
     */
    public function getCook()
    {
        return $this->cook()->first();
    }

    /**
     * @todo scaffold this
     */
    public function getCookAttribute()
    {
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
}
