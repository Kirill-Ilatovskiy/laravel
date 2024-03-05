<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i = 0; $i<99; $i++){
            Post::query()->create([
                'user_id'=> User::query()->value('id'),
                'title'=>fake()->sentence(),
                'content'=>fake()->paragraph(),
                'published'=>true, 
                'published_at'=>fake()->dateTimeBetween(now()->subYear(), now()),
            ]);
        }
       
    }
}
