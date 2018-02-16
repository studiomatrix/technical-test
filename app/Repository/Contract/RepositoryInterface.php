<?php namespace App\Repository\Contract;

/**
 * Interface RepositoryInterface
 * @package App\Repository\Contract
 */
interface RepositoryInterface
{
    public function find($id);
    public function findBy($column, $value);
    public function findManyBy($column, $value);
}