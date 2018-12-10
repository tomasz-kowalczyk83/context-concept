<?php

namespace App\Context;

use App\Context\Exceptions\InvalidContext;

class Manager
{
    /**
     * @var array
     */
    private $contexts;

    /**
     * @param array $contexts
     * @return void
     */
    public function __construct(array $contexts)
    {
        $this->contexts = $contexts;
    }

    /**
     * Return the Context
     *
     * @param string $key
     * @return Context
     */
    public function get($key)
    {
		echo "key {$key}";
        $context = array_get($this->contexts, $key);
		echo "context {$context}";
        if ($context) {
            return app($context);
        }

        throw new InvalidContext(sprintf('%s is not a valid Context', $key));
    }
}
