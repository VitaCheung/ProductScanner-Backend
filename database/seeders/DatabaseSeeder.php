<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Type;
use App\Models\Project;
use App\Models\SavedItem;
use App\Models\Like;
use App\Models\Dislike;
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

        User::truncate();
        Type::truncate();
        Project::truncate();
        SavedItem::truncate();
        Like::truncate();
        Dislike::truncate();
        
        User::factory()->count(2)->create();
        Type::factory()->count(3)->create();
        Project::factory()->count(4)->create();
        SavedItem::factory()->count(4)->create();

        Like::factory()->count(4)->create()->each(function($like){
            $users = User::all()->random(rand(1,2) )->pluck('id');
            $like->likeUsers()->attach($users);
        });

        Dislike::factory()->count(4)->create()->each(function($dislike){
            $users = User::all()->random(rand(1,2) )->pluck('id');
            $dislike->dislikeUsers()->attach($users);
        });

        // User::factory()->count(4)->create()->each(function($user){
        //     $likes = Like::all()->random(rand(1,2) )->pluck('id');
        //     $user->likes()->attach($likes);
        //     // $dislikes = Dislike::all()->random(rand(1,2) )->pluck('id');
        //     // $user->dislikes()->attach($dislikes);
        // });
            
    }
}
