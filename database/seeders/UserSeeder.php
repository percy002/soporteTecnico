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
            'email' => 'patrickinquiltupacortez@gmail.com',
            'rol' => 'administrador',
            'password' => bcrypt('70576116'),
        ])->assignRole('administrador');


        $personas=new Persona();
        $personas->name='Alexander Hancco Gamboa';
        $personas->celular='973253010';
        $personas->DNI='46666480';
        $personas->usuario='46666480@gmail.com';
        $personas->contraseña='46666480';
        $personas->rol='administrador';
        $personas->cuenta=1;
        $personas->save();
        User::create([
            'name' => 'Alexander Hancco Gamboa',
            'email' => '46666480@gmail.com',
            'rol' => 'administrador',
            'password' => bcrypt('46666480'),
        ])->assignRole('administrador');
        $personas=new Persona();
        $personas->name='Alfredo Ninancuro Pompilla';
        $personas->celular='967763179';
        $personas->DNI='24003411';
        $personas->usuario='24003411@gmail.com';
        $personas->contraseña='24003411';
        $personas->rol='administrador';
        $personas->cuenta=1;
        $personas->save();
        User::create([
            'name' => 'Alfredo Ninancuro Pompilla',
            'email' => '24003411@gmail.com',
            'rol' => 'administrador',
            'password' => bcrypt('24003411'),
        ])->assignRole('administrador');
        $personas=new Persona();
        $personas->name='Juan Jorge Alarcon Alosilla';
        $personas->celular='984776375';
        $personas->DNI='24003571';
        $personas->usuario='24003571@gmail.com';
        $personas->contraseña='24003571';
        $personas->rol='administrador';
        $personas->cuenta=1;
        $personas->save();
        User::create([
            'name' => 'Juan Jorge Alarcon Alosilla',
            'email' => '24003571@gmail.com',
            'rol' => 'administrador',
            'password' => bcrypt('24003571'),
        ])->assignRole('administrador');
        $personas=new Persona();
        $personas->name='Marco Boris Bobadilla Gutierrez';
        $personas->celular='984939797';
        $personas->DNI='42061157';
        $personas->usuario='42061157@gmail.com';
        $personas->contraseña='42061157';
        $personas->rol='administrador';
        $personas->cuenta=1;
        $personas->save();
        User::create([
            'name' => 'Marco Boris Bobadilla Gutierrez',
            'email' => '42061157@gmail.com',
            'rol' => 'administrador',
            'password' => bcrypt('42061157'),
        ])->assignRole('administrador');
        $personas=new Persona();
        $personas->name='Jhom Charlee Barrientos Ferro';
        $personas->celular='986966354';
        $personas->DNI='45659530';
        $personas->usuario='45659530@gmail.com';
        $personas->contraseña='45659530';
        $personas->rol='administrador';
        $personas->cuenta=1;
        $personas->save();
        User::create([
            'name' => 'Jhom Charlee Barrientos Ferro',
            'email' => '45659530@gmail.com',
            'rol' => 'administrador',
            'password' => bcrypt('45659530'),
        ])->assignRole('administrador');
    }
}
