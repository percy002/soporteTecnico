<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Persona;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Patrick Antonio Inquiltupa Cortez',
            'dni' => '70576116',
            'email' => 'patrickinquiltupacortez@gmail.com',
            'rol' => 'administrador',
            'password' => bcrypt('70576116'),
        ])->assignRole('administrador');


       
        User::create([
            'name' => 'Alexander Hancco Gamboa',
            'email' => '46666480@gmail.com',
            'dni'=> '46666480',
            'rol' => 'administrador',
            'password' => bcrypt('46666480'),
        ])->assignRole('administrador');
        
        User::create([
            'name' => 'Alfredo Ninancuro Pompilla',
            'email' => '24003411@gmail.com',
            'dni'=> '24003411',
            'rol' => 'administrador',
            'password' => bcrypt('24003411'),
        ])->assignRole('administrador');
        
        User::create([
            'name' => 'Juan Jorge Alarcon Alosilla',
            'email' => '24003571@gmail.com',
            'dni'=> '24003571',
            'rol' => 'administrador',
            'password' => bcrypt('24003571'),
        ])->assignRole('administrador');
        
        User::create([
            'name' => 'Marco Boris Bobadilla Gutierrez',
            'email' => '42061157@gmail.com',
            'dni'=> '42061157',
            'rol' => 'administrador',
            'password' => bcrypt('42061157'),
        ])->assignRole('administrador');
        
        User::create([
            'name' => 'Jhom Charlee Barrientos Ferro',
            'email' => '45659530@gmail.com',
            'dni'=> '45659530',
            'rol' => 'administrador',
            'password' => bcrypt('45659530'),
        ])->assignRole('administrador');
    }
}
