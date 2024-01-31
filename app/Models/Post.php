<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\NextAndPreviousPosts;
use Spatie\Tags\HasTags;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
    use NextAndPreviousPosts, HasTags;
    use InteractsWithMedia;
    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    
    protected $guarded = [
        'created_at',
        'updated_at',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];


    public function registerMediaConversions(Media $media = null): void
    {
        $this
            ->addMediaConversion('preview')
            ->fit(Fit::Contain, 300, 300)
            ->nonQueued();
    }

    public function getAllPosts()
    {
        $posts = Post::all();
        return ($posts);
    }

    public function showPost($postName)
    {
        $postName = str_replace('_', ' ', $postName);

        $post = Post::where('name', $postName)->first();

        $nextPost = $this->nextPost($post->id);

        $previousPost = $this->previousPost($post->id);


        return collect([
            'post' => $post,
            'nextPost' => $nextPost,
            'previousPost' => $previousPost
        ]);
    }
}
