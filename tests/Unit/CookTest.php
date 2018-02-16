<?php

namespace Tests\Unit;

use App\Contract\AvailabilityInterface;
use App\Contract\CookingRequestInterface;
use App\Contract\CookInterface;
use App\Contract\UserInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\Concerns\CookData;
use Tests\Concerns\CookingRequestData;
use Tests\Concerns\UserData;
use Tests\TestCase;

class CookTest extends TestCase
{
    use CookData, UserData, CookingRequestData, DatabaseTransactions;

    /** @test */
    public function willOnlyReturnApprovedCookingRequestForDay()
    {
        /** @var UserInterface $cookUser */
        $cookUser = $this->getUser('cook');
        /** @var CookInterface $cook */
        $cook = $this->getCook($cookUser);

        /** @var UserInterface $user */
        $user = $this->getUser();

        /** @var Collection $availabilities */
        $availabilities = $this->getAvailabilities($cook);
        /** @var AvailabilityInterface $anAvailability */
        $anAvailability = $availabilities->first();

        /** @var CookingRequestInterface $cookingRequest1 */
        $cookingRequest1 = $this->getCookingRequest($cook, $user, $anAvailability, false);
        /** @var CookingRequestInterface $cookingRequest2 */
        $cookingRequest2 = $this->getCookingRequest($cook, $user, $anAvailability, false);

        $this->assertFalse($cook->hasCookingRequestForDay($anAvailability->getDay()));

        /** @var CookingRequestInterface $cookingRequest3 */
        $cookingRequest3 = $this->getCookingRequest($cook, $user, $anAvailability, true);

        $this->assertTrue($cook->hasCookingRequestForDay($anAvailability->getDay()));
    }
}
