<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\models\HistoricalCriterion;
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
        // if ($this->authorize('isAdmin')) {
        //     return view('HistoricalCriteria.index');
        // } else {
        //     return redirect()->route('home');
        // }
        return view('User.Report.index');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\HistoricalCriteria  $historicalCriteria
     * @return \Illuminate\Http\Response
     */
    public function show(HistoricalCriterion $historicalCriteria)
    {
        return "this is the show page";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistoricalCriteria  $historicalCriteria
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoricalCriterion $historicalCriteria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistoricalCriteria  $historicalCriteria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoricalCriterion $historicalCriteria)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistoricalCriteria  $historicalCriteria
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoricalCriterion $historicalCriteria)
    {
        //
    }
    public function anyData()
    {
        $fieldTable = (!empty($_GET["fieldTable"])) ? ($_GET["fieldTable"]) : ('name');
        $valueSearch = (!empty($_GET["valueSearch"])) ? ($_GET["valueSearch"]) : ('');
        $month = (!empty($_GET["month"])) ? ($_GET["month"]) : ('');
        $histories = $this->historicalCriteriaRepo->getReport($fieldTable, $valueSearch, $month);
        // if ($valueSearch && $fieldTable) {
        //     $histories = $this->historicalCriteriaRepo->getData($fieldTable, $valueSearch, $month);
        // } else {
        //     $histories = $this->historicalCriteriaRepo->getAll();
        // }
        return DataTables::of($histories)
            ->editColumn('point', function ($history) {
                return is_null($history->point) ? "0" : $history->point;
            })->make(true);
    }
}
