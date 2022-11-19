<?php

use App\Models\Governorate;
use Illuminate\Database\Seeder;

class GovernoratesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $governorates = [
            'القاهرة',
            'المنصورة',
            'بورسعيد',
            'الاسكندرية',
            'الاسماعيلية',
            'السويس',
            'الجونة',
            'الساحل الشمالى',
            'العلمين',
            'مرسى مطروح',
            'رشيد',
            'دمياط',
            'الجيزة',
            'جمصة',
            'راس البر',
            'راس سدر',
            'الغردقة',
            'شرم الشيخ',
            'الاقصر',
            'اسوان',
            'العريش',
            'العين السخنة',
        ];
        foreach ($governorates as $governorate) {
            Governorate::create([
                'governorate' => $governorate
            ]);
        }
    }
}
