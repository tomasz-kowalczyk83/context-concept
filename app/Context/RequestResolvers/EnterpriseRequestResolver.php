<?php

namespace App\Context\RequestResolvers;

use App\Company\Enterprise;
use Illuminate\Http\Request;
use App\Context\RequestResolvers\Resolver;
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
            //throw new GroupNotFound('group_not_found', $id);
        }
    }
}
