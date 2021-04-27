<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Post
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'user_id'];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Comments of this post.
     *
     * @return HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany('App\Models\Comment');
    }

    public  function scopeMostCommented(Builder $query): Builder
    {
        return $query->withCount('comments')->orderBy('comments_counts','desc');

    }


}


