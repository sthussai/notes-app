<?php

namespace App\Traits;

use App\Models\Post;

trait NextAndPreviousPosts
{
    public function nextPost($postId)
    {
        $nextPost = Post::where('id', $postId + 1)->first();
        if ($nextPost) {
            $nextPost = $nextPost->name;
        } else {
            $nextPost = null;
        }
        return($nextPost);
    }

    public function previousPost($postId)
    {
        $previousPost = Post::where('id', $postId - 1)->first();
        if ($previousPost) {
            $previousPost = $previousPost->name;
        } else {
            $previousPost = null;
        }
        return($previousPost);
    }
}
