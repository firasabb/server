<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        app()['cache']->forget('spatie.permission.cache');


        $permissions = [
            'edit words',
            'delete words',
            'create words'
        ];

        foreach ($permissions as $permission) {

            $newPermission = Permission::where('name', $permission)->first();

            if($newPermission === null){
                $newPermission = Permission::create([
                    'name' => $permission
                ]);
            }
        }



        $roles = [
            'regular',
            'moderator',
            'admin'
        ];

        foreach ($roles as $role) {

            $newRole = Role::where('name', $role)->first();

            if($newRole === null){
                if($role == 'admin'){
                    $newRole = Role::create([
                        'name' => 'admin'
                    ]);
                    $newRole->givePermissionTo(Permission::all());
                } else {
                    $newRole = Role::create([
                        'name' => 'regular'
                    ]);
                    $newRole = Role::create([
                        'name' => 'moderator'
                    ]);
                }
            }
        }
    }
}
