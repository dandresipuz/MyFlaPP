<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
			'name' 		=> 'Diego Andrés',
            'lastname'  => 'Ipuz García',
			'email' 	=> 'dandresipuz@gmail.com',
			'phone' 	=> 3023744844,
			'birthdate' => '1986-04-19',
			'gender' 	=> 'Male',
			'address' 	=> 'Mi casa',
			'password' 	=> bcrypt('admin'),
			'role' 		=> 'Admin',
			'created_at'=> now(),
		]);
		// Se puede crear usuarios de esta forma
		$usr = new User;
		$usr->name 		= 'Andrea Katherine';
        $usr->lastname  = 'Castañeda Mesa';
		$usr->email 	= 'akkastaneda@gmail.com';
		$usr->phone 	= 3123616109;
		$usr->birthdate = '1986-02-04';
		$usr->gender 	= 'Female';
		$usr->address 	= 'Su casa';
		$usr->password 	= bcrypt('customer');
        $usr->role      = 'Customer';
		$usr->save();
		// Lanzar Factory
		\App\Models\User::factory()->count(50)->create();
    }
}
