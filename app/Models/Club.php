<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Club extends Model
{
	protected $fillable = [
		'name', 'slug',
	];

//	public function country()
//	{
//		return $this->belongsTo(Country::class);
//	}
	public function league()
	{
		return $this->belongsTo(League::class);
	}
}
