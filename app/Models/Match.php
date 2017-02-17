<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
	public function league()
	{
		return $this->belongsTo(League::class);
	}
	public function teamHome()
	{
		return $this->belongsTo(Club::class, 'teamHome_id');
	}
	public function teamGuest()
	{
		return $this->belongsTo(Club::class, 'teamGuest_id');
	}

	public function getDateFullAttribute()
	{
		return $this->attributes['date'] . ' ' . $this->attributes['time'];
	}

	public function setCountryIdAttribute($countryId)
	{
		return $countryId;
	}
}
