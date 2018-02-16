<?php namespace App\Repository;

use App\Repository\Contract\RepositoryInterface;
use Illuminate\Database\Eloquent\Model;

/**
 * Class BaseRepository
 * @package App\Repository
 */
class BaseRepository implements RepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * BaseRepository constructor.
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findBy($column, $value)
    {
        return $this->model->where($column, $value)->first();
    }

    /**
     * @param $column
     * @param $value
     * @return mixed
     */
    public function findManyBy($column, $value)
    {
        return $this->model->where($column, $value)->get();
    }

    public function __call($name, $arguments)
    {
        return $this->model->$name(...$arguments);
    }
}