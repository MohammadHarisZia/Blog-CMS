<?php

namespace App\Traits;

use Illuminate\Database\Eloquent\Relations\MorphToMany;
use App\Models\Tag;

trait HasTags
{
  public function tags()
  {
    return $this->tagsRelation;
  }

  public function tagsRelation(): MorphToMany
  {
    return $this->morphToMany(Tag::class, 'taggable')->withTimestamps();
  }

  public function syncTags(array $tags)
  {
    $this->save();
    $this->tagsRelation()->sync($tags);
    $this->unsetRelation('tagsRelation');
  }

  public function removeTags()
  {
    $this->tagsRelation()->detach();
    $this->unsetRelation('tagsRelation');
  }
}
