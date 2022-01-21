<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'trabajador']);
        $role2 = Role::create(['name' => 'administrador']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$role1,$role2]);

        Permission::create(['name' => 'personas.index'])->assignRole($role2);
        Permission::create(['name' => 'personas.create'])->assignRole($role2);
        Permission::create(['name' => 'personas.edit'])->assignRole($role2);
        Permission::create(['name' => 'personas.destroy'])->assignRole($role2);

        Permission::create(['name' => 'equipos.index'])->assignRole($role2);
        Permission::create(['name' => 'equipos.create'])->assignRole($role2);
        Permission::create(['name' => 'equipos.edit'])->assignRole($role2);
        Permission::create(['name' => 'equipos.destroy'])->assignRole($role2);

        Permission::create(['name' => 'mantenimientos.index'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'mantenimientos.create'])->assignRole($role2);
        Permission::create(['name' => 'mantenimientos.edit'])->assignRole($role2);
        Permission::create(['name' => 'mantenimientos.destroy'])->assignRole($role2);

        Permission::create(['name' => 'historiales.index'])->assignRole($role2);
        Permission::create(['name' => 'historiales.create'])->assignRole($role2);
        Permission::create(['name' => 'historiales.edit'])->assignRole($role2);
        Permission::create(['name' => 'historiales.destroy'])->assignRole($role2);
    }
}
