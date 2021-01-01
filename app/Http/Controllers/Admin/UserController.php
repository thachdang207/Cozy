<?php

namespace App\Http\Controllers\Admin;

use App\models\User;
use App\Repositories\users\UserRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\Criterion;
use App\models\Department;
use App\models\Role;
use yajra\Datatables\Datatables;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $userRepo;
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }
    public function index()
    {
        $departments = $this->userRepo->getAllDepartments();
        $criteria = Criterion::all();
        return view('Admin.User.index', compact('departments', 'criteria'));
    }
    public function validateForm($request)
    {
        $messages = [
            'required' => 'Please enter :attribute',
        ];
        $validatedData = $request->validate([
            'name' => 'required',
            'full_address' => 'required',
            'email' => 'required|unique:users,email,' . $request->id . ',id|email',
            'password' => 'min:9',
            'confirm_password' => 'min:9|same:password',
            'gender' => 'required',
            'birthday' => 'required|date',
            'phone_number' => 'required|numeric',
            'department_id' => 'required'
        ], $messages);
        return true;
    }
    public function getDataFromForm($request)
    {
        $roleStaff = Role::where('name', '=', 'staff')->get();
        $data['name'] = $request->name;
        $data['full_address'] = $request->full_address;
        $data['email'] = $request->email;
        $data['password'] = bcrypt($request->password);
        $data['gender'] = $request->gender;
        $data['birthday'] = $request->birthday;
        $data['phone_number'] = $request->phone_number;
        $data['department_id'] = $request->department_id;
        $data['role_id'] = $roleStaff[0]->id;
        return $data;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $departments = $this->userRepo->getAllDepartments();
        return view('Admin.User.create', compact('departments'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateForm($request);
        $data = $this->getDataFromForm($request);
        // User::insert($data);
        $this->userRepo->create($data);
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = $this->userRepo->find($id);
        return response()->json([
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->validateForm($request);
        $id = $request->id;
        $data = $this->getDataFromForm($request);
        $this->userRepo->update($id, $data);
        return response()->json([
            'data' => 'Successfully updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = $this->userRepo->delete($id);
        return response()->json([
            'data' => $data
        ]);
    }
    public function anyData()
    {

        $fieldTable = (!empty($_GET["fieldTable"])) ? ($_GET["fieldTable"]) : ('name');
        $valueSearch = (!empty($_GET["valueSearch"])) ? ($_GET["valueSearch"]) : ('');
        $users = $this->userRepo->getData($fieldTable, $valueSearch);
        // if ($valueSearch && $fieldTable) {
        //     $users = $this->userRepo->getData($fieldTable, $valueSearch);
        // } else {
        //     $users = $this->userRepo->getAll();
        // }
        return Datatables::of($users)
            ->editColumn('created_at', function ($user) {
                return date('d/m/Y', strtotime($user->created_at));
            })
            ->editColumn('updated_at', function ($user) {
                return date('d/m/Y', strtotime($user->updated_at));
            })
            ->editColumn('department_id', function ($user) {
                return $user->department->name;
            })
            ->editColumn('role_id', function ($user) {
                return $user->role->name;
            })
            ->editColumn('gender', function ($user) {
                return $user->gender == 1 ? "Male" : "Female";
            })
            ->make(true);
    }
}
