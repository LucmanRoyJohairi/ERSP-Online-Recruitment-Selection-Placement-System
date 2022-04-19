<?php

namespace Database\Factories;

use App\Models\JobRequirement;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobRequirementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = JobRequirement::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'education_qual' => $this->faker->text(20),
            'additional_qual' => $this->faker->text(20),
            'experience_req' => $this->faker->text(20),
            'document_req' => $this->faker->text(20),
            'job_id' => rand(1,10),
        ];
    }
}
