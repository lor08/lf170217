<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Chanel extends Model
{
	protected $fillable = [
		'type', 'content', 'match_id'
	];
	public $timestamps = false;

	public function match()
	{
		return $this->hasOne(Match::class);
	}

	public function scopeWithMatch($query, $onlineId)
	{
		return $query->where('match_id', $onlineId);
	}
	public function scopeWithSopcast($query, $onlineId)
	{
		return $query->where([
			['match_id', '=', $onlineId],
			['type', '=', 'sopcast']
		]);
	}
}
