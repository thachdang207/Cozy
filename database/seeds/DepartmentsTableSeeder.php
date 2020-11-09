<?php

use App\models\Department;
use Illuminate\Database\Seeder;

class DepartmentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name' => 'Human Resource'),
            array('name' => 'IT')
        );
        Department::insert($data);
    }
}
