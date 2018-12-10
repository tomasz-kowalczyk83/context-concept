<?php

namespace App\Traits;

use App\Tag;
use App\Tagged;
use Illuminate\Support\Facades\Input;

trait Taggable
{
	public static function bootTaggable()
	{
		static::saved(function ($model) {

			if(Input::has('tag_id')){
				$model->retag(Input::get('tag_id'));
			} else {
				$model->untag();
			}
		});
	}

	public function tagged()
	{
		return $this->morphMany('App\Tagged', 'taggable')->with('tag');
	}

	public function tags()
	{
		//return $this->tagged->tag
	}

	public function getTagIdAttribute()
	{
		return $this->tagged->pluck('tag.id')->toArray();
	}

	public function tag($tags)
	{
		foreach($tags as $tag)
		{
			$this->addTag($tag);
		}
	}

	public function untag($tags = null)
	{
		if(is_null($tags)) {
			$tags = $this->tagId;
		}

		dump('tags to remove', $tags);
		foreach($tags as $tag)
		{
			$this->removeTag($tag);
		}
	}

	public function retag($tags)
	{
		$deletions = array_diff($this->tagId, $tags);
		$additions = array_diff($tags, $this->tagId);

		$this->untag($deletions);
		$this->tag($additions);
	}

	public function addTag($tagid)
	{
		$tagged = new Tagged([
			'tag_id' => $tagid,
		]);

		$this->tagged()->save($tagged);

		$this->incrementCount($tagid);
	}

	public function removeTag($tagid)
	{
		$deleted = $this->tagged()->where('tag_id', '=', $tagid)->delete();

		$this->decrementCount($tagid);
	}

	private function incrementCount($tagid)
	{
		$tag = Tag::find($tagid);

		$tag->count++;
		$tag->save();
	}

	private function decrementCount($tagid)
	{
		$tag = Tag::find($tagid);
		if($tag->count > 0) {
			$tag->count--;
			$tag->save();
		}
	}
}
