<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $role1=role::create(['name'=>'admin']);
        $role2=role::create(['name'=>'cliente']);

        Permission::create(['name' => 'admin.users.index'])->syncRoles($role1); //si quieres asignar a un solo rol
        Permission::create(['name' => 'admin.users.show'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.edit'])->syncRoles($role1);
        Permission::create(['name' => 'admin.users.destroy'])->syncRoles([$role1]);//si se asigna a varios

        Permission::create(['name' => 'productos.index'])->syncRoles($role1); //si quieres asignar a un solo rol
        Permission::create(['name' => 'productos.create'])->syncRoles($role1);
        Permission::create(['name' => 'productos.edit'])->syncRoles($role1);
        Permission::create(['name' => 'productos.destroy'])->syncRoles([$role1]);//si se asigna a varios

        Permission::create(['name' => 'payment.index'])->syncRoles($role1); //si quieres asignar a un solo rol
        Permission::create(['name' => 'payment.create'])->syncRoles($role1);
        Permission::create(['name' => 'payment.destroy'])->syncRoles([$role1]);//si se asigna a varios
    }
}
