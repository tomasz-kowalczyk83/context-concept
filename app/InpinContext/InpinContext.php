<?php

namespace App\InpinContext;

use Illuminate\Database\Eloquent\Model;

class InpinContext
{
	/**
	 * @var Model
	 */
	private $model;

	private $resolver;


	/**
	 * @var string
	 */
	private static $type = '';

	public function __construct()
    {
        //$this->resolver = $resolver;
    }
	/**
	 * Check to see if the context has been set
	 *
	 * @return bool
	 */
	public function check()
	{
	    return ! is_null($this->model);
	}

	/**
	 * Get the id of the context
	 *
	 * @return int
	 */
	public function id()
	{
	    if ($this->check()) {
	        return $this->model->id;
	    }
	}

	/**
	 * Set the context
	 *
	 * @param Model $model
	 * @return Context
	 */
	public function set(Model $model)
	{
	    $this->model = $model;

	    return $this;
	}

	/**
	 * Get the underlying Model
	 *
	 * @return Model
	 */
	public function model()
	{
	    if ($this->check()) {
	        return $this->model;
	    }

	    return new UnknownContext(self::$type);
	}
}
