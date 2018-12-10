<?php

namespace App\Traits;

use App\Scope;

trait ScopeableTrait {

	protected static function bootScopeableTrait()
	{
		static::created(function($model){
			Scope::create([
				'scopeable_type' => get_class($model),
				'scopeable_id' => $model->id
			]);
		});
	}

	public function scope()
	{
		return $this->morphOne('App\Scope', 'scopeable');
	}

	public function users()
	{
		return $this->manyThroughMany('App\User', 'App\Role', 'user_id', 'role_id', 'scope_id');
	}

	public function assignRole($user, $role)
	{
		return $user->roles()->save(
			Role::whereName($role)->firstOrFail(),
			['scope_id' => $this->scope->id]
		);
	}

	/*
	 * Solution found at: https://laravel.io/forum/03-04-2014-hasmanythrough-with-many-to-many
	 * minor tweak to use cope_id rather than id of the model
	 */
	public function manyThroughMany($related, $through, $firstKey, $secondKey, $pivotKey)
    {
        $model = new $related;
        $table = $model->getTable();
        $throughModel = new $through;
		$throughTable = $throughModel->getTable();
        $pivot = 'role_user';
		$scopeid = $this->scope->id;

        return $model
			->join($pivot, $pivot . '.' . $firstKey, '=', $table . '.id')
			->join($throughTable, $throughTable . '.id', '=', $pivot . '.' . $secondKey)
			->select($table . '.*')
            ->where($pivot . '.' . $pivotKey, '=', $scopeid);

    }
}
