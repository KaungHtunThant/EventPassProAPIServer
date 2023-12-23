<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Super Admin']);
        $role1->givePermissionTo(Permission::all());

        $role2 = Role::create(['name' => 'Admin']);
        $role2->givePermissionTo([
            'User.Read.Own',
            'Log.Read.Own',
            'Log.Update.Own',
            'Client.Read.Own',
            'Client.Update.Own'
            'Event.Read.Own',
            'Event.Update.Own',
        ]);
    }
}
