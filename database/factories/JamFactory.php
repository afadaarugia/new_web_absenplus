<?php

namespace Database\Factories;

use App\Models\Jam;
use Illuminate\Database\Eloquent\Factories\Factory;

class JamFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jam::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'masuk' => $this->faker->date('Y-m-d H:i:s'),
        'pulang' => $this->faker->date('Y-m-d H:i:s'),
        'keterangan' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s')
        ];
    }
}
