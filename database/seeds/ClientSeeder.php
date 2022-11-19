<?php

use App\Models\client;
use App\Models\clientProfile;
use Illuminate\Database\Seeder;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [1, 'منى مصطفى درويش', 'mona_mostafa@gmail.com', now(), bcrypt('12341234'), ['عميل'], 'active'],
            [2, 'عصام رفعت الدرشابى', 'essam_refaat@gmail.com', now(), bcrypt('12341234'), ['عميل'], 'active'],
            [3, 'الهام ممدوح فرج', 'elham_mamdouh@gmail.com', now(), bcrypt('12341234'), ['عميل'], 'active'],
            [4, 'ابتهال السيد حمزة', 'ibtehal_hamza@gmail.com', now(), bcrypt('12341234'), ['عميل'], 'active'],
            [5, 'كوثر عبدالوهاب محمود', 'kawthar_mahmoud@gmail.com', now(), bcrypt('12341234'), ['عميل'], 'active'],
            [6, 'محمد احمد طه السيد', 'mohamed_taha@gmail.com', now(), bcrypt('12341234'), ['عميل'], 'active'],
            [7, 'احمد مجدى صالح سلامه', 'ahmed_magdy@gmail.com', now(), bcrypt('12341234'), ['عميل'], 'active'],
            [8, 'رضا سعد مرعى', 'reda_saad_marey@gmail.com', now(), bcrypt('12341234'), ['عميل'], 'active'],
        ];
        foreach ($clients as $client) {
            Client::create([
                'name' => $client[1],
                'email' => $client[2],
                'email_verified_at' => $client[3],
                'password' => $client[4],
                'role_name' => $client[5],
                'Status' => $client[6],
            ]);
            ClientProfile::create([
                'client_id' => $client[0],
                'profile_pic' => 'assets/img/guest.png',
            ]);
        }
    }
}
