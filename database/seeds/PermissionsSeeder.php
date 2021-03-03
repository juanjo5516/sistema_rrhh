<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;
use App\User;

class PermissionsSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        

        // create permissions
        Permission::create(['name' => 'Modulo Desglose Salarios']);
        Permission::create(['name' => 'Modulo Personal']);
        Permission::create(['name' => 'Modulo Listados']);

        // create roles and assign existing permissions
        $role1 = Role::create(['name' => 'Administrador']);
        $role1->givePermissionTo('Modulo Desglose Salarios');
        $role1->givePermissionTo('Modulo Personal');
        $role1->givePermissionTo('Modulo Listados');

        $role2 = Role::create(['name' => 'Visor']);
        $role1->givePermissionTo('Modulo Listados');

        // create demo users
        $user = User::where('name','Administrador')->first();
        $user->assignRole($role1);
    }
}