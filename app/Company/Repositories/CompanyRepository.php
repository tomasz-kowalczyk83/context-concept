<?php

namespace App\Company\Repositories;

use App\Company\Enterprise;
use App\Company\Interfaces\CompanyInterface;

class CompanyRepository implements CompanyInterface {

    public $model;

    public function __construct(\App\Company\Company $model)
    {
        $this->model = $model;
        echo "construct";
        dump($model);
    }

    public function getView()
    {
        // TODO: Implement getView() method.
        dump($this->model);
        return $this->model->platformProvider->getView();
    }

    public function test($id)
    {
        // TODO: Implement test() method.
        echo "I'm a test";
        return $this->model->findOrfail($id);

    }

}