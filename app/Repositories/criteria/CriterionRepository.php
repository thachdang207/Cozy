<?php

namespace App\Repositories\criteria;

use App\models\Criterion;
use App\models\Department;
use App\models\Role;
use App\models\User;
use App\Repositories\BaseRepository;

class CriterionRepository extends BaseRepository implements CriterionRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\models\Criterion::class;
    }
    public function getData($fieldTable, $valueSearch)
    {
        return Criterion::where($fieldTable, 'LIKE', '%' . $valueSearch . '%')->get();
    }
}
