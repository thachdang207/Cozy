<?php

use App\models\Department;
use App\models\HistoricalCriteria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RolesTableSeeder::class);
        $this->call(DepartmentsTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(CriteriaTableSeeder::class);
        // $this->call(HistoricalCriteria::class);
    }
}
