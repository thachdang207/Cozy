<?php

namespace App\Repositories\users;

use App\Repositories\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getData($fieldTable, $valueSearch);
    public function getAllDepartments();
}
