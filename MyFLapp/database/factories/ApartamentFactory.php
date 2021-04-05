<?php

namespace Database\Factories;

use App\Models\Apartament;
use Illuminate\Database\Eloquent\Factories\Factory;

class ApartamentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Apartament::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $slider = $this->faker->randomElement($array = array(1, 0));
        $active = $this->faker->randomElement($array = array(1, 0));
        $photo  = $this->faker->image('public/images/apartaments', 140, 140, 'city');
        $user_id = $this->faker->randomElement($array = array(1, 52));
        $residential_id = $this->faker->randomElement($array = array(1, 10));

        return [
            'number'        => $this->faker->numberBetween($min = 1101, $max = 9999),
            'description'   => $this->faker->text($maxNbChars = 200),
            'slider'        => $slider,
            'price'         => $this->faker->numberBetween($min = 500000, $max = 1000000),
            'active'        => $active,
            'photo'         => substr($photo, 7),
            'user_id'       => $user_id,
            'residential_id'=> $residential_id,

        ];
    }
}
