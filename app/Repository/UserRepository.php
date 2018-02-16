<?php namespace App\Repository;

use App\Repository\Contract\UserRepositoryInterface;
use App\User;

/**
 * Class UserRepository
 * @package App\Repository
 */
class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param User $model
     */
    public function __construct(User $model)
    {
        parent::__construct($model);
    }
}