<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class HistoricalCriterion extends Model
{
    protected $fillable = ['user_id', 'criterion_id', 'date'];
    public $timestamps = true;
    public function criterion()
    {
        return $this->belongsTo('App\models\Criterion');
    }
    public function user()
    {
        return $this->belongsTo('App\models\User');
    }
}
