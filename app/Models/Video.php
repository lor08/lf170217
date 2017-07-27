<?php

namespace App\Models;

use App\Traits\Categorizable;
use App\Traits\Taggable;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Request;

class Video extends Model
{
	use Categorizable, Taggable;
	
	/**
	 * The attributes that are mass assignable.
	 * @var array
	 */
	protected $fillable = [
		'name', 'slug', 'preview_text', 'preview_img', 'detail_text', 'detail_img', 'views', 'sort', 'status', 'created_at'
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

	public function getCreatedAttribute()
	{
		$now = Carbon::parse($this->created_at)->addDay();
		$yesterday = Carbon::parse($this->created_at)->addDay(-1);
		if(Carbon::now()->between($now, $yesterday)){
			$data = Carbon::parse($this->created_at)->diffForHumans();
		}else{
			$data = Carbon::parse($this->created_at)->formatLocalized('%e %b %Y');
		}
		return $data;
	}
}
