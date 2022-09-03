<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
        
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'full_name' => $this->faker->name(),
            'email' => $this->faker->safeEmail(),
            'gender' => $this->faker->numberBetween(1,2),
            'postcode' => $this->faker->shuffle(),
            'address' => $this->faker->city(),
            'opinion' => $this->faker->sentence()
        ];
    }
}
