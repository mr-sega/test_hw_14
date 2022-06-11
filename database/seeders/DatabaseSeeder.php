<?php

namespace Database\Seeders;

use App\Models\Ads;
use App\Models\Comments;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $users = \App\Models\User::factory(10)->create();

        $users->each(function (User $user) {
            \App\Models\Ads::factory(10)->create(['user_id' => $user->id]);
        });

        $tags = \App\Models\Tags::factory(15)->create();

        Ads::all()->each(function (Ads $ads) use ($tags, $users) {
            $ads->tags()->sync($tags->random(rand(3, 5)));

            Comments::factory()->create([
                'user_id' => $users->random()->id,
                'ads_id' => $ads->id,
            ]);
        });
    }
}
