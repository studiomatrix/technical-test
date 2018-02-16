<?php

use Illuminate\Database\Seeder;

class CookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 25)->create(['role' => 'cook'])->each(function ($user) {
            $cook = factory(\App\Cook::class)->create(['user_id' => $user->id]);
            $days = array_rand(range(0, 6), 2);
            foreach ($days as $day) {
                factory(App\Availability::class)->create(['cook_id' => $cook->id, 'day' => $day]);
            }
        });
    }
}
