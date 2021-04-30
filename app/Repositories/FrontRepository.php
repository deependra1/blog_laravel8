<?php

namespace App\Repositories;

use App\Models\Post;
use Illuminate\Support\Str;

class FrontRepository
{
    protected function getActivePosts()
    {
        return Post::select(
            'id',
            'slug',
            'image',
            'title',
            'excerpt',
        )->whereActive('on');
    }


    protected function getPostsOrderedByDate()
    {
        return $this->getActivePosts()->latest();
    }


    public function getHeros()
    {
        return $this->getPostsOrderedByDate()->with('category')->take(5)->get();
    }

    public function getAllPosts()
    {
        return $this->getPostsOrderedByDate()->paginate(5);
    }
}
