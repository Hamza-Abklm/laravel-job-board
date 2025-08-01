<?php

namespace Database\Factories;

use App\Models\Comment;
use Illuminate\Database\Eloquent\Factories\Factory;
use Str;
use App\Models\Post;

class CommentFactory extends Factory
{
    protected $model = Comment::class;    //linking to model

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'post_id'=> Post::factory() ,
            'content'=> $this->faker->sentence,
            // 'created_at' => now(),
            // 'updated_at' => now(),
            'author' =>$this->faker->name
            
        ];
    }
}
