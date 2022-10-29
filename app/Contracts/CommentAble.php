<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

interface CommentAble
{
  public function title();

  public function comments();

  public function latestComments(int $amount  = 5);

  public function deleteComments();

  public function commentsRelation(): MorphMany;

  public function commentAbleTitle(): string;
}
