<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
// use Faker\Generator as Faker;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $gender = $this->faker->randomElement($array = array('Female', 'Male'));
        $photo  = $this->faker->image('public/images/users', 140, 140, 'cats');

        if ($gender == 'Female') {
            $name = $this->faker->firstNameFemale();
        } else {
            $name = $this->faker->firstNameMale();
        }
        return [
            'gender'            => $gender,
            'name'              => $name,
            'lastname'          => $this->faker->lastName(),
            'email'             => $this->faker->unique()->safeEmail,
            'phone'             => $this->faker->numberBetween($min = 3101000000, $max = 3202000000),
            'birthdate'         => $this->faker->dateTimeBetween($starDate = '-60 years', $endDate = '-21 years'),
            'address'           => $this->faker->streetAddress(),
            'photo'             => substr($photo, 7),
            'email_verified_at' => now(),
            'password'          => bcrypt('customer'), // password
            'remember_token'    => Str::random(50),
        ];
    }
}


/* $factory->define(User::class, function (Faker $faker) {

    $gender = $faker->randomElement($array = array('Female', 'Male'));
    $photo  = $faker->image('public/images/users', 140, 140, 'people');

    if ($gender == 'Female') {
        $name = $faker->firstNameFemale();
    } else {
        $name = $faker->firstNameMale();
    }
    return [
        'gender'            => $gender,
        'name'              => $name,
        'lastname'          => $faker->lastName(),
        'email'             => $faker->unique()->safeEmail,
        'phone'             => $faker->numberBetween($min = 3101000000, $max = 3202000000),
        'birthdate'         => $faker->dateTimeBetween($starDate = '-60 years', $endDate = '-21 years'),
        'address'           => $faker->streetAddress(),
        'photo'             => substr($photo, 7),
        'email_verified_at' => now(),
        'password'          => bcrypt('customer'), // password
        'remember_token'    => Str::random(50),
    ];
}); */
