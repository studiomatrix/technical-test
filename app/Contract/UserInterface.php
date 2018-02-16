<?php namespace App\Contract;

/**
 * Interface UserInterface
 * @package App\Contract
 */
interface UserInterface
{
    public function getId();
    public function hasRole($role);
    public function getRole();
    public function setRole($role);
}