<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Request;

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
	public function country()
	{
		return $this->belongsTo(Country::class);
	}
	public function leagues()
	{
		return $this->belongsToMany(League::class);
	}

	public function setSlugAttribute($slug)
	{
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
}
