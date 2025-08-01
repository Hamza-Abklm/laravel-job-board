<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Str;
use App\Models\Post;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    protected $model = Post::class;    //linking to model

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id'=> Str::uuid()->toString(),
            'title'=> $this->faker->sentence,
            'body'=> $this->faker->paragraphs(3,true),
            'author' =>$this->faker->name,
            'published' => $this->faker->boolean(),
        ];
    }
}
