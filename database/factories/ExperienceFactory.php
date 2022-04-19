<?php

namespace Database\Factories;

use App\Models\Experience;
use Illuminate\Database\Eloquent\Factories\Factory;

class ExperienceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Experience::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'job_title' => $this->faker->jobTitle(),
            'company' => $this->faker->company(),
            'total_years' => 5,
            'email' => $this->faker->companyEmail(),
            'user_id' => rand(1,10),
        ];
    }
}
