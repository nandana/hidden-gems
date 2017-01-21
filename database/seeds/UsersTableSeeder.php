<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $juan = App\User::create([
        	'name'=>'Juan',
        	'surname'=>'Martinez',
        	'email'=>'juanmartinez@gmail.com',
        	'password'=>bcrypt('secret'),
        	'address'=>'Via Inexistente n. 1',
        	'city'=>'Valdecabras',
        	'phonenumber'=>'123456789',
        	'gender'=>'male',
        	'age'=>'48',
        	'image'=>'juan.png'
        ]);

        $daisy = App\User::create([
        	'name'=>'Daisy',
        	'surname'=>'Williams',
        	'email'=>'daisy@gmail.com',
        	'password'=>bcrypt('secret'),
        	'address'=>'Via Improbable n. 1',
        	'city'=>'NYC',
        	'phonenumber'=>'000000001',
        	'gender'=>'female',
        	'age'=>'24',
        	'image'=>'daisy.png'
        ]);

        $ben = App\User::create([
        	'name'=>'Ben',
        	'surname'=>'Williams',
        	'email'=>'ben@gmail.com',
        	'password'=>bcrypt('secret'),
        	'address'=>'Via Improbable n. 1',
        	'city'=>'NYC',
        	'phonenumber'=>'000000002',
        	'gender'=>'male',
        	'age'=>'26',
        	'image'=>'ben.png'
        ]);
    }
}
