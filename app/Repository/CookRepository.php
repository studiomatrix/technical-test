<?php namespace App\Repository;

use App\Cook;
use App\Repository\Contract\CookRepositoryInterface;

/**
 * Class CookRepository
 * @package App\Repository
 */
class CookRepository extends BaseRepository implements CookRepositoryInterface
{
    public function __construct(Cook $model)
    {
        parent::__construct($model);
    }

    /**
     * @param $perPage
     * @return mixed
     */
    public function paginateCooks($perPage)
    {
        return  $this->model->paginate($perPage);
    }
}
