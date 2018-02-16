<?php namespace App\Contract;

/**
 * @todo complete this
 *
 * Interface CookInterface
 * @package App\Contract
 */
interface CookInterface
{
    public function getId();
    public function hasCookingRequestForDay($day);
    public function getAvailabilities();
    public function getCookingRequests();
}