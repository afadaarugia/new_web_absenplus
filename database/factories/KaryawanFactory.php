<?php

namespace Database\Factories;

use App\Models\Karyawan;
use Illuminate\Database\Eloquent\Factories\Factory;

class KaryawanFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Karyawan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'foto' => $this->faker->word,
        'nama' => $this->faker->word,
        'alamat' => $this->faker->text,
        'jenis_kelamin' => $this->faker->word,
        'created_at' => $this->faker->date('Y-m-d H:i:s'),
        'updated_at' => $this->faker->date('Y-m-d H:i:s'),
        'deleted_at' => $this->faker->date('Y-m-d H:i:s'),
        'name_positions_id' => $this->faker->randomDigitNotNull,
        'sektors_id' => $this->faker->randomDigitNotNull,
        'kotas_id' => $this->faker->randomDigitNotNull,
        'users_id' => $this->faker->word
        ];
    }
}
