<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Request;

class File extends Model
{

	public function scopeWithLoads($query, $onlineId)
	{
		return $query->where('load_id', $onlineId);
	}
}
