<?php

namespace App\Models;

use App\Traits\Categorizable;
use App\Traits\Taggable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Request;

class News extends Model
{
	use Categorizable, Taggable;

	/**
	 * The attributes that are mass assignable.
	 * @var array
	 */
	protected $fillable = [
		'name', 'slug', 'preview_text', 'preview_img', 'detail_text', 'detail_img', 'views', 'sort', 'status'
	];

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
