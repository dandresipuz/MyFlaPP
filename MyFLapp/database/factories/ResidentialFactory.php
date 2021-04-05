<?php

namespace Database\Factories;

use App\Models\Residential;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResidentialFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Residential::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->lastName();
        $residential = $this->faker->firstName();
        $slider = $this->faker->randomElement($array = array(1, 0));
        $active = $this->faker->randomElement($array = array(1, 0));
        $photo  = $this->faker->image('public/images/residentials', 140, 140, 'business');
        $user_id = $this->faker->randomElement($array = array(1, 52));
        return [
            'name'          => 'C.R. ' . $name .' '. $residential,
            'description'   => $this->faker->text($maxNbChars = 200),
            'photo'         => substr($photo, 7),
            'active'        => $active,
            'phone'         => $this->faker->numberBetween($min = 3101000000, $max = 3202000000),
            'address'       => $this->faker->streetAddress(),
            'slider'        => $slider,
            'user_id'       => $user_id,
            'city'          => $this->faker->city(),
        ];
    }
}
