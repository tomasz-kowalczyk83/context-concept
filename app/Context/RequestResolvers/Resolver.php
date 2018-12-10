<?php

namespace App\Context\RequestResolvers;

use Illuminate\Http\Request;


interface Resolver
{
    /**
     * Resolve the Entity
     *
     * @return Model
     */
    public function resolve(Request $request);
}
