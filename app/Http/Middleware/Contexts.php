<?php

namespace App\Http\Middleware;

use Closure;
use App\Facades\Context;
use App\Facades\RequestResolver;

class Contexts
{
    /**
     * Handle an incoming request
     *
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function handle($request, Closure $next)
    {
        // $context = Context::get('enterprise');
		// $context->resolve($request);
		// dump($context);

		$inpincontext = app('inpincontext');
		//figure out what context type we need
		//grab or inject correct resolver
		$contextresolver = RequestResolver::get('enterprise');

		//resolve the url and return model instance
		$resolved = $contextresolver->resolve($request);
		//set the context

		$inpincontext->set($resolved);
		//dump($inpincontext);

        return $next($request);
    }
}
