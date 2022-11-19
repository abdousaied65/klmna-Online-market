<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            ['admins list','admin'],
            ['show admin','admin'],
            ['add admin','admin'],
            ['edit admin','admin'],
            ['delete admin','admin'],

            ['clients list','client'],
            ['show client','client'],
            ['add client','client'],
            ['edit client','client'],
            ['delete client','client'],

            ['customers list','customer'],
            ['show customer','customer'],
            ['add customer','customer'],
            ['edit customer','customer'],
            ['delete customer','customer'],

            ['depts list','dept'],
            ['show dept','dept'],
            ['add dept','dept'],
            ['edit dept','dept'],
            ['delete dept','dept'],

            ['intervals list','interval'],
            ['show interval','interval'],
            ['add interval','interval'],
            ['edit interval','interval'],
            ['delete interval','interval'],

            ['currencies list','currency'],
            ['show currency','currency'],
            ['add currency','currency'],
            ['edit currency','currency'],
            ['delete currency','currency'],

            ['posts list','post'],
            ['show post','post'],
            ['add post','post'],
            ['edit post','post'],
            ['delete post','post'],

            ['governorates list','governorate'],
            ['show governorate','governorate'],
            ['add governorate','governorate'],
            ['edit governorate','governorate'],
            ['delete governorate','governorate'],

            ['services list','service'],
            ['show service','service'],
            ['add service','service'],
            ['edit service','service'],
            ['delete service','service'],

            ['units list','unit'],
            ['show unit','unit'],
            ['add unit','unit'],
            ['edit unit','unit'],
            ['delete unit','unit'],
        ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission[0],
                'key' => $permission[1],
                'guard_name' => 'admin-web'
            ]);
        }
    }
}
