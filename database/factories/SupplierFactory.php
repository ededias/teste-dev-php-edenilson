<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'fantasy' => $this->faker->company(),
            'social' => $this->faker->company(),
            'email' => $this->faker->unique()->companyEmail(),
            'phone' => $this->faker->numerify('(##)#####-####'),
            'ie' => $this->faker->numerify('##########'),
            'im' => $this->faker->numerify('##########'),
            'document' => $this->faker->numerify('##.###.###/####-##'),
            'category' => 'mei'
        ];
    }
}
