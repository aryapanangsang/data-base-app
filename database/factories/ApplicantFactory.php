<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Applicant>
 */
class ApplicantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'appplicant_name' =>$this->faker->name(),
            'identity_number' =>$this->faker->nik(),
            'npwp' => $this->faker->randomDigit(12),
            'bpjs_kesehatan' => $this->faker->randomDigit(12),
            'birth_of' => $this->faker->city(),
            'birth_of_date' => $this->faker->date(),
            'address' => $this->faker->address(),
            'domisili' => $this->faker->address(),
            'phone_number' =>$this->faker->phoneNumber(),
            'wa_number' =>$this->faker->phoneNumber(),
            'email' => $this->faker->email(),
            'emergency_number' =>$this->faker->phoneNumber(),
            'emergency_number_name' =>$this->faker->name(),
            'maried_status' =>$this->faker->word(),            
            'religion' => $this->faker->word(),
            'height' => $this->faker->randomDigit(2),
            'weight' => $this->faker->randomDigit(2),
            'uniform_size' => $this->faker->randomDigit(2),
            'shoes_size' => $this->faker->randomDigit(2),
            'mother' => $this->faker->name(),
            'father' => $this->faker->name(),
            'vaccine' => $this->faker->randomDigit(2),
            'education_level' => $this->faker->word(),
            'graduated' => $this->faker->year(),
            'vaccine' => $this->faker->randomDigit(2),
            'major' => $this->faker->word(),
            'math_value' => $this->faker->randomDigit(2),            
        ];
    }
}
