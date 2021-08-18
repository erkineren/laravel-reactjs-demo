<?php

namespace Database\Factories;

use App\Models\Purchase;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PurchaseFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Purchase::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::factory(),
//            'course_id' => Course::factory(),
            'price' => $this->faker->numberBetween(10.0, 50.0),
            'paid_at' => $this->faker->optional(.8)->dateTimeBetween('-1 months')
        ];
    }
}
