<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Request;

class Match extends Model
{

	public function league()
	{
		return $this->belongsTo(League::class);
	}
	public function year()
	{
		return $this->belongsTo(LeagueYear::class);
	}
	public function teamHome()
	{
		return $this->belongsTo(Club::class, 'teamHome_id');
	}
	public function teamGuest()
	{
		return $this->belongsTo(Club::class, 'teamGuest_id');
	}
	public function channels()
	{
		return $this->hasMany(Chanel::class);
	}

	public function setCountryIdAttribute($countryId)
	{
		return $countryId;
	}
	public function setSlugAttribute($slug)
	{
		$slug = str_slug($this->teamHome->name . "-" . $this->teamGuest->name);
		if ($slug == '') $slug = str_slug(Request::get('name'), '_');
		if ($cat = self::where('slug', $slug)->first()) {
			$idmax = self::max('id') + 1;
			if (isset($this->attributes['id'])) {
				if ($this->attributes['id'] != $cat->id) {
					$slug = $slug . '_' . ++$idmax;
				}
			} else {
				if (self::where('slug', $slug)->count() > 0)
					$slug = $slug . '_' . ++$idmax;
			}
		}
		$this->attributes['slug'] = $slug;
	}

	public function getDateFullAttribute()
	{
		return $this->attributes['date'] . ' ' . $this->attributes['time'];
	}
	public function getIsOnlineAttribute()
	{
		$start = Carbon::parse($this->datetime)->addMinutes(-15);
		$end = clone $start;
		$end = $end->addHours(2)->addMinutes(15);
		return Carbon::now()->between($start, $end);
	}
	public function getIsFinishedAttribute()
	{
		$start = Carbon::parse($this->datetime);
		return Carbon::now() < $start;
	}
	public function getDateForHumansAttribute()
	{
		return Carbon::parse($this->datetime)->diffForHumans();
	}
	public function getStartDateAttribute()
	{
		return Carbon::parse($this->datetime)->format("d-m-Y");
	}
	public function getStartTimeAttribute()
	{
		return Carbon::parse($this->datetime)->format("H:i");
	}
}
