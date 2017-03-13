<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Request;

class Page extends Model
{
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
