<?php

namespace App\Company;

use App\Company\Company;
use Illuminate\Database\Eloquent\Model;

class TrainingProvider extends Company
{
    //
    protected $fillable = ['name'];
    protected $hasMembers = false;
    protected $analytics = 'basic';
    protected $manageTheme = false;


    public static function boot() {
        parent::boot();

    }

    public function __construct()
    {
        parent::__construct();
        $this->platformProvider = \App::make('App\Company\Platforms\Elearning');
        echo "Training Provider construct";

    }
}
