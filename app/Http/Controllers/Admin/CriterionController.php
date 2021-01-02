<?php

namespace App\Http\Controllers\Admin;

use App\models\Criterion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\criteria\CriterionRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class CriterionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $criterionRepo;
    public function __construct(CriterionRepositoryInterface $criterionRepo)
    {
        $this->criterionRepo = $criterionRepo;
    }
    public function index()
    {
        return view('Admin.Criteria.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.Criteria.create');
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
        $this->criterionRepo->create($data);
        return redirect()->route('criteria.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Criterion  $criterion
     * @return \Illuminate\Http\Response
     */
    public function show(Criterion $criterion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Criterion  $criterion
     * @return \Illuminate\Http\Response
     */
    public function edit(Criterion $criterion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Criterion  $criterion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Criterion $criterion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Criterion  $criterion
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->criterionRepo->delete($id);
        return response()->json([
            'data' => 'Deleted successfully'
        ]);
    }
    public function anyData()
    {

        $fieldTable = (!empty($_GET["fieldTable"])) ? ($_GET["fieldTable"]) : ('');
        $valueSearch = (!empty($_GET["valueSearch"])) ? ($_GET["valueSearch"]) : ('');

        if ($valueSearch && $fieldTable) {
            $criteria = $this->criterionRepo->getData($fieldTable, $valueSearch);
        } else {
            $criteria = $this->criterionRepo->getAll();
        }

        return DataTables::of($criteria)
            ->editColumn('created_at', function ($criteria) {
                return date('d/m/Y', strtotime($criteria->created_at));
            })
            ->editColumn('updated_at', function ($criteria) {
                return date('d/m/Y', strtotime($criteria->updated_at));
            })
            ->make(true);
    }
    public function validateForm($request)
    {
        $messages = [
            'required' => 'Please enter :attribute',
        ];
        $validatedData = $request->validate([
            'name' => 'required',
            'point' => 'required|numeric',
            'description' => 'required',
        ], $messages);
        return true;
    }
    public function getDataFromForm($request)
    {
        $data['name'] = $request->name;
        $data['point'] = $request->point;
        $data['description'] = $request->description;
        return $data;
    }
}
