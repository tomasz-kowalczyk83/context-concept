<?php

namespace App\InpinContext\RequestResolvers;

use App\Company\Enterprise;
use App\System;
use Illuminate\Http\Request;
use App\InpinContext\RequestResolvers\Resolver;
//use Cribbb\Groups\Exceptions\GroupNotFound;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class EnterpriseRequestResolver implements Resolver
{
    /**
     * Resolve the Entity
     *
     * @return Model
     */
    public function resolve(Request $request)
    {
        $route = $request->route();

        $id = $route->parameter('enterprise');

        try {
            return Enterprise::where('id', $id)->firstOrFail();
        }

        catch (ModelNotFoundException $e) {
            return System::firstOrCreate([]);
        }
    }
}
