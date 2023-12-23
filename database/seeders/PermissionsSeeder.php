<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //User
        Permission::create(['name' => 'User.Create']);
        Permission::create(['name' => 'User.Read.All']);
        Permission::create(['name' => 'User.Read.Own']);
        Permission::create(['name' => 'User.Update.All']);
        Permission::create(['name' => 'User.Update.Own']);
        Permission::create(['name' => 'User.Delete']);

        //Log
        Permission::create(['name' => 'Log.Read.All']);
        Permission::create(['name' => 'Log.Read.Own']);
        Permission::create(['name' => 'Log.Update.All']);
        Permission::create(['name' => 'Log.Update.Own']);

        //Client
        Permission::create(['name' => 'Client.Read.All']);
        Permission::create(['name' => 'Client.Read.Own']);
        Permission::create(['name' => 'Client.Update.All']);
        Permission::create(['name' => 'Client.Update.Own']);
        Permission::create(['name' => 'Client.Delete.All']);

        //Event
        Permission::create(['name' => 'Event.Read.All']);
        Permission::create(['name' => 'Event.Read.Own']);
        Permission::create(['name' => 'Event.Update.All']);
        Permission::create(['name' => 'Event.Update.Own']);
        Permission::create(['name' => 'Event.Delete.All']);
        Permission::create(['name' => 'Event.Delete.Own']);
    }
}
