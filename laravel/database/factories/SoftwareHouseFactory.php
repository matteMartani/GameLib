<?php

namespace Database\Factories;

use App\Models\GameUser;
use App\Models\SoftwareHouse;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SoftwareHouse>
 */
class SoftwareHouseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SoftwareHouse::class;


    public function definition()
    {
            return [
                'nome' => $this->faker->name,
            ];
    }
}
