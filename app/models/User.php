<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = ['name', 'full_address', 'gender', 'birthday', 'email', 'phone_number', 'role_id'];
    protected $hidden = ['password'];
    public function role()
    {
        return $this->belongsTo('App\models\Role');
    }
    public function historicalCriteria()
    {
        return $this->hasMany('App\models\HistoricalCriterion');
    }
    public function department()
    {
        return $this->belongsTo('App\models\Department');
    }
}
