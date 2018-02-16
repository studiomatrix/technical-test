<?php namespace Tests\Concerns;

use App\Contract\AvailabilityInterface;
use App\Contract\CookInterface;
use App\Contract\UserInterface;
use App\CookingRequest;

trait CookingRequestData
{

    /**
     * @param CookInterface $cook
     * @param UserInterface $user
     * @param AvailabilityInterface $availability
     * @param bool $approved
     * @return mixed
     */
    public function getCookingRequest(
        CookInterface $cook,
        UserInterface $user,
        AvailabilityInterface $availability,
        $approved = true
    ) {
        $cookingRequest = factory(CookingRequest::class)->create([
            'cook_id' => $cook->getId(),
            'user_id' => $user->getId(),
            'availability_id' => $availability->getId(),
            'approved' => $approved
        ]);

        return $cookingRequest;
    }
}