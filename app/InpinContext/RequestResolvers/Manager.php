<?php

namespace App\InpinContext\RequestResolvers;

use App\Context\Exceptions\InvalidContext;

class Manager
{
    /**
     * @var array
     */
    private $requestResolvers;

    /**
     * @param array $contexts
     * @return void
     */
    public function __construct(array $requestResolvers)
    {
        $this->requestResolvers = $requestResolvers;
    }

    /**
     * Return the Context
     *
     * @param string $key
     * @return Context
     */
    public function get($key)
    {
        $requestResolver = array_get($this->requestResolvers, $key);
		
        if ($requestResolver) {
            return app($requestResolver);
        }

        throw new InvalidContext(sprintf('%s is not a valid request resolver', $key));
    }
}
