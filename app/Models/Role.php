<?php

namespace App\Models;

use Cartalyst\Sentinel\Roles\EloquentRole;

class Role extends EloquentRole
{
	public function permits()
	{
		return $this->belongsToMany('App\Models\Permit');
	}

//	public function setPermitsAttribute($permits)
//	{
//		// устанавливаем новый набор прав для роли
//		$this->setPermissions([]);
//		if (isset($permits))
//			foreach($permits as $permitid)
//			{
//				$permit = Permit::find($permitid);
//				$this->addPermission($permit->slug);
//			}
//
//		// перепрописываем отношения с таблицей permits
//		$this->permits()->detach();
//		if ( ! $permits) return;
//		if ( ! $this->exists) $this->save();
//		$this->permits()->attach($permits);
//
//	}

//	public function getPermitsAttribute($permits)
//	{
//		return array_pluck($this->permits()->get()->toArray(), 'id');
//	}

}