<?php

namespace App\Company\Repositories;

use App\Company\Enterprise;
use App\Company\Interfaces\CompanyInterface;

class CompanyRepository implements CompanyInterface {

    public $model;

    public function __construct(\App\Company\Company $model)
    {
        $this->model = $model;
    }

    public function getView()
    {
        return $this->model->platformProvider->getView();
    }

    public function test($id)
    {
        return $this->model->findOrfail($id);

    }

}
