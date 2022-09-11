<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\phone_numbers>
 */
class phone_numbersFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $result = '';
    
        for($i = 0; $i < 8; $i++) {
            $result .= mt_rand(0, 9);
        }
        return [
            'user'=>'cosmin1805',
            'first_name' => fake()->name(),
            'last_name' => fake()->name(),
            'phone_number' => '07'.$result,
        ];
    }
}
