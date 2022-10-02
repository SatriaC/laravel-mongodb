<?php

namespace Database\Factories;

use App\Models\Mobil;
use Illuminate\Database\Eloquent\Factories\Factory;

class MobilFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Mobil::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'mesin' => $this->faker->word(2,true),
            'kapasitas' => $this->faker->numberBetween($min = 2, $max = 15),
            'mesin' => $this->faker->word,
        ];
    }
}
