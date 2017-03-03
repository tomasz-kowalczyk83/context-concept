<?php

namespace App\Company;

use Illuminate\Database\Eloquent\Model;

abstract class Company extends Model {

    protected $hasMembers;
    protected $analytics;
    protected $manageTheme;
    public $platformProvider = 'hybrid';

    public function hasMembers()
    {
        return $this->hasMembers;
    }

    public function analytics()
    {
        return $this->analytics;
    }

    public function manageTheme()
    {
        return $this->manageTheme;
    }

    public function owner()
    {
        return $this->belongsTo('App\User');
    }
}