<?php

namespace Database\Factories;

use App\Models\Absensi;
use Illuminate\Database\Eloquent\Factories\Factory;

class AbsensiFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Absensi::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'time_in' => $this->faker->date('Y-m-d H:i:s'),
        'time_out' => $this->faker->date('Y-m-d H:i:s'),
        'longitude' => $this->faker->randomDigitNotNull,
        'latitude' => $this->faker->randomDigitNotNull,
        'keterangan' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'karyawans_id' => $this->faker->randomDigitNotNull
        ];
    }
}
