<?php namespace App\Repository\Contract;

/**
 * Interface CookRepositoryInterface
 * @package App\Repository\Contract
 */
interface CookRepositoryInterface
{
    public function paginateCooks($perPage);
}