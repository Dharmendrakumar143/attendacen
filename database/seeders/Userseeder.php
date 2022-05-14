<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\contact;
	
		
class Userseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
		User::create([
			'name'=>'sumit',
			'email'=>'sumit@gmail.com',
			'password'=>bcrypt('password')
		]);
		
		contact::create([
			'address'=>'Mohali',
			'phone'=>'9658475812',
			'user_id'=>'14'
		]);
    }
}
