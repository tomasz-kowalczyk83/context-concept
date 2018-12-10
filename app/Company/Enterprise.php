<?php

namespace App\Company;

use App\Company\Company;
use App\Company\Platforms\Video;
use Illuminate\Database\Eloquent\Model;

class Enterprise extends Company
{
    //
    protected $fillable = ['name'];
    protected $hasMembers = true;
    protected $analytics ='advanced';
    protected $manageTheme = true;

    public static function boot()
    {
        parent::boot();
    }

    public function __construct()
    {
        parent::__construct();
        $this->platformProvider = \App::make('App\Company\Platforms\Video');
    }


}
