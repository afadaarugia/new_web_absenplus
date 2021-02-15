<?php

namespace Database\Factories;

use App\Models\NamePosition;
use Illuminate\Database\Eloquent\Factories\Factory;

class NamePositionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = NamePosition::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'levels_id' => $this->faker->randomDigitNotNull
        ];
    }
}
