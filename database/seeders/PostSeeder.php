<?php

namespace Database\Seeders;

use App\Models\{CookingPost, Post, ReadingPost, User};
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if (User::find(1)) {
            Post::factory()
                ->count(3)
                ->state([
                    'user_id' => 1,
                    'post_type' => 'cooking'
                ])
                ->has(CookingPost::factory())
                ->create();

            Post::factory()
                ->count(3)
                ->state([
                    'user_id' => 1,
                    'post_type' => 'reading'
                ])
                ->has(ReadingPost::factory())
                ->create();
        }
    }
}
