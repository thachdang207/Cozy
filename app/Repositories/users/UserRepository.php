<?php

namespace App\Repositories\users;

use App\models\Department;
use App\models\Role;
use App\models\User;
use App\Repositories\BaseRepository;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\models\User::class;
    }
    public function getAll()
    {
        return User::where('role_id', '<>', 1);
    }
    public function getAllDepartments()
    {
        return Department::all();
    }
    public function create($attributes = [])
    {
        $user = new User;
        $user->name = $attributes['name'];
        $user->full_address = $attributes['full_address'];
        $user->email = $attributes['email'];
        $user->password = $attributes['password'];
        $user->gender = $attributes['gender'];
        $user->birthday = $attributes['birthday'];
        $user->phone_number = $attributes['phone_number'];
        $user->department_id = $attributes['department_id'];
        $user->role_id = $attributes['role_id'];
        $user->name = $attributes['name'];
        $user->save();
        return;
    }
    public function getData($fieldTable, $valueSearch)
    {
        // dd($fieldTable);
        $roleId = Role::where('name', 'LIKE', '%admin%');
        return User::where($fieldTable, 'LIKE', '%' . $valueSearch . '%')->where('role_id', '<>', $roleId[0]->id);
    }
}
