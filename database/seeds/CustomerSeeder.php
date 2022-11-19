<?php

use App\Models\customer;
use App\Models\CustomerProfile;
use Illuminate\Database\Seeder;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $customers = [
            [1,'عبده سعيد فهيم شاور','01092716796',now(),bcrypt('12341234'),['زبون'],'active'],
            [2,'احمد جادالله','01023574821',now(),bcrypt('12341234'),['زبون'],'active'],
            [3,'على محمد جلال','01173654392',now(),bcrypt('12341234'),['زبون'],'active'],
            [4,'اسامة ربيع','01265437890',now(),bcrypt('12341234'),['زبون'],'active'],
            [5,'نورهان فتحى عمر','01027094563',now(),bcrypt('12341234'),['زبون'],'active'],
            [6,'ريهام شاور','01076542828',now(),bcrypt('12341234'),['زبون'],'active'],
            [7,'روان عبده شاور','01028363452',now(),bcrypt('12341234'),['زبون'],'active'],
        ];
        foreach ($customers as $customer) {
            Customer::create([
                'name' => $customer[1],
                'phone_number' => $customer[2],
                'password' => $customer[4],
                'role_name' => $customer[5],
                'Status' => $customer[6],
            ]);
            CustomerProfile::create([
                'customer_id' => $customer[0],
                'profile_pic' => 'assets/img/guest.png',
            ]);
        }
    }
}
