<?php

use App\models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker\Factory::create();
        // $data = array(
        //     'name' => $faker->sentence(1),
        //     'full_address' => $faker->sentence(2),
        //     'gender' => 1,
        //     'birthday' => $faker->date(),
        //     'email' => 'admin1@gmail.com',
        //     'phone_number' => $faker->numberBetween(10000000000, 99999999999),
        //     'password' => bcrypt('123123123'),
        //     'role_id' => 1,
        //     'department_id' => 1
        // );
        // User::insert(
        //     $data
        // );
        // for ($i = 0; $i < 10; $i++) {
        //     User::insert(
        //         [
        //             'name' => $faker->sentence(1),
        //             'full_address' => $faker->sentence(2),
        //             'gender' => 1,
        //             'birthday' => $faker->date(),
        //             'email' => 'user' . $i . '@gmail.com',
        //             'phone_number' => $faker->numberBetween(10000000000, 99999999999),
        //             'password' => bcrypt('123123123'),
        //             'role_id' => 2,
        //             'department_id' => 2
        //         ]
        //     );
        // }
        $data = array(
            'name' => 'Đặng Hữu Thạch',
            'full_address' => 'Quảng nam',
            'gender' => 1,
            'birthday' => '1999-07-20',
            'email' => 'admin@gmail.com',
            'phone_number' => '0783297616',
            'password' => bcrypt('123123123'),
            'role_id' => 1,
            'department_id' => 1
        );
        User::insert(
            $data
        );
        for ($i = 0; $i < 10; $i++) {
            User::insert(
                [
                    'name' => 'Đặng Thị Ngân',
                    'full_address' => 'Quảng Nam',
                    'gender' => 1,
                    'birthday' => '1989-03-05',
                    'email' => 'user' . $i . '@gmail.com',
                    'phone_number' => '07812345' . $i,
                    'password' => bcrypt('123123123'),
                    'role_id' => 2,
                    'department_id' => 2
                ]
            );
        }
    }
}
