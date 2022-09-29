<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RequestsToSuppliers>
 */
class RequestsToSuppliersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'book_id' => $this->faker->randomDigit,
            'request_date' => $this->faker->dateTime,
            'delivery_confirmation' => $this->faker->randomDigit,
            'corporate_id' => $this->faker->randomDigit
        ];
    }
}
