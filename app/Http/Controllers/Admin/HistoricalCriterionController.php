<?php

namespace App\Http\Controllers\Admin;

use App\models\HistoricalCriterion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\historical_criteria\HistoricalCriterionRepositoryInterface;
use Yajra\DataTables\Facades\DataTables;

class HistoricalCriterionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $historicalCriteriaRepo;
    public function __construct(HistoricalCriterionRepositoryInterface $historicalCriteriaRepo)
    {
        $this->historicalCriteriaRepo = $historicalCriteriaRepo;
    }
    public function index()
    {
        return view('Admin.HistoricalCriteria.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $id = $request->id;
        $data = json_decode($request->checkbox);
        // $date = $request->date;
        for ($i = 0; $i < count($data); $i++) {
            $data[$i] = (array) $data[$i];
        }
        // dd($data);
        $this->historicalCriteriaRepo->store($data);
        // HistoricalCriterion::insert($data);
        return response()->json([
            'data' => 'successfully created'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistoricalCriterion  $historicalCriterion
     * @return \Illuminate\Http\Response
     */
    public function show(HistoricalCriterion $historicalCriterion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistoricalCriterion  $historicalCriterion
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoricalCriterion $historicalCriterion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistoricalCriterion  $historicalCriterion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoricalCriterion $historicalCriterion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistoricalCriterion  $historicalCriterion
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoricalCriterion $historicalCriterion)
    {
        //
    }
    public function anyData()
    {
        $fieldTable = (!empty($_GET["fieldTable"])) ? ($_GET["fieldTable"]) : ('user_id');
        $valueSearch = (!empty($_GET["valueSearch"])) ? ($_GET["valueSearch"]) : ('');
        $month = (!empty($_GET["month"])) ? ($_GET["month"]) : ('');
        $historicalCriteria = $this->historicalCriteriaRepo->getData($fieldTable, $valueSearch, $month);
        // dd($histories);
        // if ($valueSearch && $fieldTable) {
        //     $histories = $this->historicalCriteriaRepo->getData($fieldTable, $valueSearch, $month);
        // } else {
        //     $histories = $this->historicalCriteriaRepo->getAll();
        // }
        return DataTables::of($historicalCriteria)
            ->editColumn('created_at', function ($historicalCriterion) {
                return date('d/m/Y', strtotime($historicalCriterion->created_at));
            })
            ->editColumn('updated_at', function ($historicalCriterion) {
                return date('d/m/Y', strtotime($historicalCriterion->updated_at));
            })
            ->editColumn('date', function ($historicalCriterion) {
                return date('d/m/Y', strtotime($historicalCriterion->date));
            })
            ->editColumn('user_id', function ($historicalCriterion) {
                return $historicalCriterion->user->name;
            })
            ->editColumn('criterion_id', function ($historicalCriterion) {
                return $historicalCriterion->criterion->name;
            })
            ->addColumn('department_id', function ($historicalCriterion) {
                return $historicalCriterion->user->department->name;
            })
            ->addColumn('point', function ($historicalCriterion) {
                return $historicalCriterion->criterion->point;
            })
            ->addColumn('email', function ($historicalCriterion) {
                return $historicalCriterion->user->email;
            })
            ->make(true);
    }
}
