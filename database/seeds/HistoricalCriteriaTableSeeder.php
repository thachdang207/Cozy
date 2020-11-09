<?php

use App\models\HistoricalCriterion;
use Illuminate\Database\Seeder;

class HistoricalCriteriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = array();
        HistoricalCriterion::insert($data);
    }
}
