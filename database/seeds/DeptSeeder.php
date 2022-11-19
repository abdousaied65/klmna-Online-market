<?php

use App\Models\Dept;
use Illuminate\Database\Seeder;

class DeptSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $depts = [
            'فنادق',
            'استراحات',
            'سيارات',
            'قاعات افراح',
        ];
        foreach ($depts as $dept) {
            Dept::create([
                'dept_name' => $dept
            ]);
        }
    }
}
