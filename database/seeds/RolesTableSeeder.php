<?php

use App\models\Role;
use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array(
            array('name' => 'admin', 'description' => 'cho phep xem thong tin,chinh sua thong tin nhan vien'),
            array('name' => 'staff', 'description' => 'cho phep xem thong tin chung')
        );
        Role::insert($data);
    }
}
