<?php namespace App\Repository;

use App\CookingRequest;
use App\Repository\Contract\CookingRequestRepositoryInterface;

/**
 * Class CookingRequestRepository
 * @package App\Repository
 */
class CookingRequestRepository extends BaseRepository implements CookingRequestRepositoryInterface
{
    /**
     * UserRepository constructor.
     * @param CookingRequest $model
     */
    public function __construct(CookingRequest $model)
    {
        parent::__construct($model);
    }
}