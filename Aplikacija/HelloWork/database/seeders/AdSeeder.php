<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ad;
use Faker\Factory as Faker;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();

        // Definisanje mapiranja za job_type
        $jobTypes = [
            'Full-time' => 1,
            'Part-time' => 2,
            'Contract' => 3,
        ];

        foreach (range(1, 10) as $index) {
            Ad::create([
                'title' => $faker->jobTitle,
                'address' => $faker->address,
                'job_type' => $jobTypes[$faker->randomElement(array_keys($jobTypes))],
                'min_salary' => $faker->numberBetween(30000, 50000),
                'max_salary' => $faker->numberBetween(60000, 100000),
                'job_category' => $faker->randomElement(['IT', 'Healthcare', 'Finance', 'Education']),
                'working_time' => $faker->randomElement(['Day', 'Night', 'Flexible']),
                'number_of_jobs_needed' => $faker->numberBetween(1, 5),
                'payment_method' => $faker->randomElement(['Bank Transfer', 'Cash', 'Check']),
                'description' => $faker->paragraph,
                'ad_duration' => $faker->numberBetween(30, 90),
                'image' => $faker->imageUrl(640, 480, 'business', true, 'Faker'),
            ]);
        }
    }
}
