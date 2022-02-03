<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ResponsableSeeder extends Seeder
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
            'name' => 'Patrick Antonio Inquiltupa Cortez',
            'dni' => '70576116',
            'email' => 'patrickinquiltupacortez@gmail.com',
            'rol' => 'administrador',
            'password' => bcrypt('70576116'),
        ])->assignRole('administrador');
    }
}
