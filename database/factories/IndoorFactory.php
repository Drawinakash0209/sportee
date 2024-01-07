<?php

namespace Database\Factories;

use Faker\Core\Number;
use Faker\Provider\bg_BG\PhoneNumber;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Indoor>
 */
class IndoorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'tags'=> 'Cricket, Futsal, Badminton',
            'location' => $this->faker->city(),
            'email' => $this->faker->companyEmail(),
            'website' => $this->faker->url(),
            'description'=>$this->faker->paragraph(5),
            'contact_number'=>$this->faker->PhoneNumber(),
            'price'=>$this->faker->phoneNumber()

            //
        ];
    }
}
