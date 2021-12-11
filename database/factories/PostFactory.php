<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Comment;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->text(),
            'image' => $this->faker->imageUrl(),
            'user_id' => function(){
                return User::all()->random();
            },
            'category_id' => function(){
                return Category::all()->random();
            },
        ];
    }
}
