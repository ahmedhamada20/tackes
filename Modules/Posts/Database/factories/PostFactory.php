<?php

namespace Modules\Posts\Database\factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = \Modules\Posts\Entities\Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name(),
            'author' => $this->faker->name(),
            'image' => $this->faker->image(storage_path('app/public/posts'),640,480, null, false),
            'date' => date('Y-m-d'),
            'content' => $this->faker->paragraph(),
        ];

    }
}

