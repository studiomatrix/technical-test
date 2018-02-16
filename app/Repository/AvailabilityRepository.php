<?php namespace App\Repository;

use App\Availability;
use App\Repository\Contract\AvailabilityRepositoryInterface;

/**
 * Class AvailabilityRepository
 * @package App\Repository
 */
class AvailabilityRepository extends BaseRepository implements AvailabilityRepositoryInterface
{
    /**
     * AvailabilityRepository constructor.
     * @param Availability $model
     */
    public function __construct(Availability $model)
    {
        parent::__construct($model);
    }
}