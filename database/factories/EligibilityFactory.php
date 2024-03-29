<?php

namespace Database\Factories;

use App\Models\Eligibility;
use Illuminate\Database\Eloquent\Factories\Factory;

class EligibilityFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Eligibility::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'eligibility_name' => $this->faker->jobTitle(),
            'user_id' => rand(1,10),
        ];
    }
}
