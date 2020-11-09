<?php

namespace App\Repositories\criteria;

use App\Repositories\RepositoryInterface;

interface CriterionRepositoryInterface extends RepositoryInterface
{
    public function getData($fieldTable, $valueSearch);
}
