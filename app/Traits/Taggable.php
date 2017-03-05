<?php
/**
 * Created by PhpStorm.
 * User: szhih
 * Date: 01.03.17
 * Time: 12:26
 */

declare(strict_types = 1);
namespace App\Traits;

use App\Models\Tag;
use Cache;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

trait Taggable
{
	/**
	 * @return mixed
	 */
	public function tags(): MorphToMany
	{
		return $this->morphToMany(Tag::class, 'taggable', 'tags_relations');
	}

	/**
	 * @return mixed
	 */
	public function tagsList(): array
	{
		return $this->tags()
			->lists('name', 'id')
			->toArray();
	}

	public function getRelatedAttribute()
	{
		$data = Cache::remember(self::class . "_related_" . $this->id, config('liga-fifa.cacheTime'), function () {
			$data = array();
			foreach ($this->tags as $tag) {
				$news = $tag->entries(self::class)->with('categories')->get();
				foreach ($news as $item) {
					$data[] = $item;
				}
			}
			$data = collect($data)->whereNotIn('id', $this->id)->unique('id')->values();
			if ($data->count()){
				return $data->random(4);
			} else return $data;

		});
		return $data;
	}

//	/**
//	 * @param $tags
//	 * @internal param $tags
//	 */
//	public function categorize($tags): void
//	{
//		foreach ($tags as $tag) {
//			$this->addTag($tag);
//		}
//	}
//
//	/**
//	 * @param $tags
//	 * @internal param $tags
//	 */
//	public function uncategorize($tags): void
//	{
//		foreach ($tags as $tag) {
//			$this->removeTag($tag);
//		}
//	}
//	/**
//	 * @param $categories
//	 */
//	public function recategorize($tags): void
//	{
//		$this->tags()->sync([]);
//		$this->categorize($tags);
//	}

	/**
	 * @param Model $tag
	 * @internal param Model $tag
	 */
	public function addTag(Model $tag): void
	{
		if (!$this->tags->contains($tag->getKey())) {
			$this->tags()->attach($tag);
		}
	}

	/**
	 * @param Model $tag
	 * @internal param Model $tag
	 */
	public function removeTag(Model $tag): void
	{
		$this->tags()->detach($tag);
	}
}