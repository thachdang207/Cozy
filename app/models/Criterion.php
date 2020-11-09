<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Criterion extends Model
{
    protected $fillable = ['name', 'point', 'description'];
    public function historicalCriteria()
    {
        return $this->belongsTo('App\models\HistoricalCriterion');
    }
}
