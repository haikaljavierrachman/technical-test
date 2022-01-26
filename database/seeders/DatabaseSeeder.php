<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Staff;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Staff::create([
            'nama' => 'Haikal Javier',
            'gender' => 'Laki-laki',
            'nohp' => '081234567890',
            'email' => 'haikal@gmail.com',
            'salary' => '6000000',
            'foto' => 'images/' . 'eoQlbaBVDB9VmlxHgLuCWbFu1SioAUGmQbrDiT0M.png'
        ]);

        Staff::create([
            'nama' => 'Javier Rachman',
            'gender' => 'Laki-laki',
            'nohp' => '08122855567890',
            'email' => 'javier@gmail.com',
            'salary' => '5000000',
            'foto' => 'images' . 'defult.jpg'
        ]);

        Staff::create([
            'nama' => 'Sania',
            'gender' => 'Perempuan',
            'nohp' => '008495567890',
            'email' => 'sania@gmail.com',
            'salary' => '4000000',
            'foto' => ''
        ]);
    }
}
