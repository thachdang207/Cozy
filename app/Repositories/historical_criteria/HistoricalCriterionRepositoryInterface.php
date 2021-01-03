<?php

namespace App\Repositories\historical_criteria;

use App\Repositories\RepositoryInterface;

interface HistoricalCriterionRepositoryInterface extends RepositoryInterface
{
    public function getReport($fieldTable, $valueSearch, $month);
    public function getData($fieldTable, $valueSearch, $month);
    public function store($attribute = []);
    public function getTickForEachUser($id, $date);
}
