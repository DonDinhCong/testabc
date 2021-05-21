<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i <= 10; $i++){
            User::create([
                'name' => 'Dinh Cong Don ' . $i,
                'email' => 'don'.$i.'@gmail.com',
                'password' => Hash::make('1'),
                'gender' => 0,
                'phone' => '1234 789',
                'address' => 'Bac Ninh',
                'birthday' => date('Y-m-d'),
            ]);
        }
    }
}
