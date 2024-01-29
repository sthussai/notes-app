<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\NextAndPreviousPosts;
use Spatie\Tags\HasTags;

class Post extends Model
{
    use NextAndPreviousPosts, HasTags;

    /**
     * The attributes that are not mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'created_at', 'updated_at',
    ];

    protected $dates = [
        'start_date',
        'end_date',
    ];

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


     return collect( [
        'post' => $post,
        'nextPost' => $nextPost,
        'previousPost' => $previousPost]);
    }
}
