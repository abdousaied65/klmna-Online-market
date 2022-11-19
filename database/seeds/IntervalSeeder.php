<?php

use App\Models\interval;
use Illuminate\Database\Seeder;

class IntervalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $intervals = [
            'الساعة',
            'الليلة الواحده',
            'اليوم كامل',
            'الاسبوع',
            'الشهر'
        ];
        foreach ($intervals as $interval) {
            Interval::create([
                'interval_name' => $interval
            ]);
        }
    }
}
