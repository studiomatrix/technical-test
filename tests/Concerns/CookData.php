<?php namespace Tests\Concerns;

use App\Availability;
use App\Contract\CookInterface;
use App\Contract\UserInterface;
use App\Cook;

/**
 * Class CookData
 * @package Tests\Concerns
 */
trait CookData
{
    /**
     * @return mixed
     */
    public function getCook(UserInterface $user)
    {
        $cook = factory(Cook::class)->create(['user_id' => $user->getId()]);

        return $cook;
    }

    /**
     * @param CookInterface $cook
     * @param array $days
     */
    public function getAvailabilities(CookInterface $cook, $days = [])
    {
        if (empty($days)) {
            $days = array_rand(range(0, 6), 2);
        }
        foreach ($days as $day) {
            factory(Availability::class)->create(['cook_id' => $cook->getId(), 'day' => $day]);
        }

        return $cook->fresh()->getAvailabilities();
    }
}
