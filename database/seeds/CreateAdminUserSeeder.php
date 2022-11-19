<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use App\Models\AdminProfile;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // super admin roles and permissions
        $role = Role::create(['name' => 'مدير النظام','guard_name' => 'admin-web']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        DB::table('model_has_roles')->insert([
            'role_id' => 1,
            'model_type' => 'App\Models\Admin',
            'model_id' => 1,
        ]);
        // super admin
        $admin = Admin::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => bcrypt('12341234'),
            'role_name' =>["مدير النظام"] ,
            'Status' => 'active',
            'phone_number' => '01092716796',
            'email_verified_at' =>now(),
            'api_token' => Str::random(80)
        ]);
        $profile = AdminProfile::create([
            'city_name' => '',
            'age' => '',
            'gender' => '',
            'profile_pic' => 'assets/img/guest.png',
            'admin_id' => $admin->id
        ]);

        // admin roles and permissions
        $role = Role::create(['name' => 'موظف','guard_name' => 'admin-web']);
        $permissions = Permission::pluck('id','id')->all();
        $role->syncPermissions($permissions);
        DB::table('model_has_roles')->insert([
            'role_id' => 2,
            'model_type' => 'App\Models\Admin',
            'model_id' => 2,
        ]);

        // client roles and permissions

        $role = Role::create(['name' => 'عميل','guard_name' => 'client-web']);
        DB::table('model_has_roles')->insert([
            'role_id' => 3,
            'model_type' => 'App\Models\Client',
            'model_id' => 3,
        ]);
        $permissions = [6,7,8,9,10];
        foreach ($permissions as $permission){
            DB::table('role_has_permissions')->insert([
                'permission_id' => $permission,
                'role_id' => $role->id
            ]);
        }

        $role = Role::create(['name' => 'زبون','guard_name' => 'web']);
        DB::table('model_has_roles')->insert([
            'role_id' => 4,
            'model_type' => 'App\Models\Customer',
            'model_id' => 4,
        ]);
        $permissions = [11,12,13,14,15];
        foreach ($permissions as $permission){
            DB::table('role_has_permissions')->insert([
                'permission_id' => $permission,
                'role_id' => $role->id
            ]);
        }

    }
}
