<?php namespace Tests\Concerns;

use App\User;

/**
 * Class CookData
 * @package Tests\Concerns
 */
trait UserData
{
    /**
     * @return mixed
     */
    public function getUser($role = 'user')
    {
        return factory(User::class)->create(['role' => $role]);
    }
}
