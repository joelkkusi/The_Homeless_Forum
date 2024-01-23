<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Comment;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $users = User::factory(10)->create();

        $posts = Post::factory(200)->recycle($users)->create();

        $comment = Comment::factory(100)->recycle($users)->recycle($posts)->create();

        $joel = User::factory()
            ->has(Post::factory()->count(45))
            ->has(Comment::factory(120)->recycle($posts))
            ->create([
            'name' => 'Mike Oxlong',
            'email' => 'mikeoxlong@example.com',
        ]);
    }
}
