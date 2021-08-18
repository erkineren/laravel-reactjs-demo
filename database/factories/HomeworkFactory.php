<?php

namespace Database\Factories;

use App\Models\Homework;
use App\Models\Lecture;
use Illuminate\Database\Eloquent\Factories\Factory;

class HomeworkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Homework::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->text(50),
            'description' => $this->faker->text,
            'due_at' => $this->faker->dateTimeBetween('+1 months', '+2 months')
        ];
    }
}
