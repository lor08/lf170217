<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
	public function country()
	{
		return $this->belongsTo(Country::class);
	}
	public function year()
	{
		return $this->belongsTo(LeagueYear::class);
	}
}
