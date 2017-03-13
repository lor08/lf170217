<?php

namespace App\Models;

use Cache;
use Illuminate\Database\Eloquent\Model;

class Chanel extends Model
{
	protected $fillable = [
		'type', 'content', 'match_id'
	];

	public $timestamps = false;

	public static function boot()
	{
		parent::boot();

		static::saved(function($channel){
			$cacheKey = Match::class . "_" . $channel->match->slug;
			if (Cache::has($cacheKey)) {
				Cache::forget($cacheKey);
			}
		});
		static::deleted(function($channel){
			$cacheKey = Match::class . "_" . $channel->match->slug;
			if (Cache::has($cacheKey)) {
				Cache::forget($cacheKey);
			}
		});

	}

	public function match()
	{
		return $this->belongsTo(Match::class);
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
