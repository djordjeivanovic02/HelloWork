<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'address' => $this->faker->address,
            'job_type' => $this->faker->randomElement([1, 2, 3, 4]), // pretpostavka da su vrednosti 1, 2, 3, 4
            'min_salary' => $this->faker->numberBetween(1000, 5000),
            'max_salary' => $this->faker->numberBetween(5000, 10000),
            'job_category' => $this->faker->randomElement([1, 2, 3]), // pretpostavka da su vrednosti 1, 2, 3
            'working_time' => $this->faker->randomElement([1, 2, 3]), // pretpostavka da su vrednosti 1, 2, 3
            'number_of_jobs_needed' => $this->faker->numberBetween(1, 10),
            'payment_method' => $this->faker->randomElement([1, 2, 3]), // pretpostavka da su vrednosti 1, 2, 3
            'description' => $this->faker->paragraph,
            'ad_duration' => $this->faker->randomElement([1, 2, 3]), // pretpostavka da su vrednosti 1, 2, 3
            'image' => $this->faker->imageUrl(640, 480)
        ];
    }
}
