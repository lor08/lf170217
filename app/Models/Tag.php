<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Tag extends Model
{
	/**
	 * @var array
	 */
	protected $fillable = ['name'];

	/**
	 * @return \Illuminate\Database\Eloquent\Relations\MorphTo
	 */
	public function taggable(): MorphTo
	{
		return $this->morphTo();
	}

	/**
	 * @param $class
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
	 */
	public function entries(string $class): MorphToMany
	{
		return $this->morphedByMany($class, 'taggable', 'tags_relations');
	}
}
