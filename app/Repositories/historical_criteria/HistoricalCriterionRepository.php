<?php

namespace App\Repositories\historical_criteria;

use App\models\Criterion;
use App\models\HistoricalCriterion;
use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

class HistoricalCriterionRepository extends BaseRepository implements HistoricalCriterionRepositoryInterface
{
    //lấy model tương ứng
    public function getModel()
    {
        return \App\models\HistoricalCriterion::class;
    }
    public function getAll()
    {
        return DB::table('historical_criteria')
            ->join('criteria', 'criteria.id', '=', 'historical_criteria.criterion_id')
            ->join('users', 'users.id', '=', 'historical_criteria.user_id')
            ->select('users.name as name', DB::raw('sum(criteria.point) as point'))
            ->groupBy('user_id')
            ->get();
    }
    public function getData($fieldTable, $valueSearch, $time)
    {
        return HistoricalCriterion::all();
    }
    public function getReport($fieldTable, $valueSearch, $time)
    {
        $month = date('m', strtotime($time));
        $year = date('Y', strtotime($time));
        // return DB::table('historical_criteria')->select('users.name as name', DB::raw('DATE_FORMAT(historical_criteria.date, "%Y-%m") as date'), DB::raw('sum(criteria.point) as point'))
        //     ->rightJoin('users', 'users.id', '=', 'historical_criteria.user_id')
        //     ->join('criteria', 'criteria.id', '=', 'historical_criteria.criterion_id')
        //     ->whereYear('date', '=', $year)->whereMonth('date', '=', $month)
        //     ->groupBy(DB::raw('YEAR(date)'), DB::raw('MONTH(date)'))
        //     ->groupBy('user_id')->having($fieldTable, 'LIKE', '%' . $valueSearch . '%')
        //     ->get();
        return DB::table('users')
            ->select('users.name as name', 'history.*')
            ->leftJoin(
                DB::raw('(SELECT DATE_FORMAT(historical_criteria.date, "%Y-%m") as date,sum(criteria.point) as point,historical_criteria.user_id FROM historical_criteria inner join criteria on historical_criteria.criterion_id=criteria.id where year(date)=' . $year . ' and month(date)=' . $month . '  GROUP BY historical_criteria.user_id)
               as history'),
                'users.id',
                '=',
                'history.user_id'
            )->where($fieldTable, 'LIKE', '%' . $valueSearch . '%')
            ->get();
    }
    public function store($attribute = [])
    {
        HistoricalCriterion::insert($attribute);
    }
}
