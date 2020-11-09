<?php

use App\models\Criterion;
use App\models\Criteria;
use Illuminate\Database\Seeder;

class CriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name' => 'Đi sớm', 'point' => '2', 'description' => "nhan vien di som duoc thuong diem"),
            array('name' => 'Đi trễ', 'point' => '-2', 'description' => "nhan vien di tre bi tru diem"),
        );
        Criterion::insert($data);
    }
}
