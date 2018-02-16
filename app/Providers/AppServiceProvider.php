<?php

namespace App\Providers;

use App\Availability;
use App\Contract\AvailabilityInterface;
use App\Contract\CookingRequestInterface;
use App\Contract\CookInterface;
use App\Contract\UserInterface;
use App\Cook;
use App\CookingRequest;
use App\Repository\AvailabilityRepository;
use App\Repository\Contract\AvailabilityRepositoryInterface;
use App\Repository\Contract\CookingRequestRepositoryInterface;
use App\Repository\Contract\UserRepositoryInterface;
use App\Repository\CookingRequestRepository;
use App\Repository\UserRepository;
use App\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\ServiceProvider;
//
use App\Repository\Contract\CookRepositoryInterface;
use App\Repository\CookRepository;

/**
 * Class AppServiceProvider
 * @package App\Providers
 */
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserInterface::class, User::class);
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(AvailabilityInterface::class, Availability::class);
        $this->app->bind(AvailabilityRepositoryInterface::class, AvailabilityRepository::class);
        $this->app->bind(CookInterface::class, Cook::class);
        $this->app->bind(CookingRequestInterface::class, CookingRequest::class);
        $this->app->bind(CookingRequestRepositoryInterface::class, CookingRequestRepository::class);
    }
}
