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
            'created_at',
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

    public function getPostBySlug($slug)
    {
        $post=Post::with(
            'tags:id,name,slug',
            'category:id,title,slug',
            )
            ->whereSlug($slug)
            ->firstOrFail();

        // Previous post
        $post->previous = $this->getPreviousPost($post->id);

        // Next post
        $post->next = $this->getNextPost($post->id);

        return $post;
    }

    protected function getPreviousPost($id)
    {
        return Post::select('title', 'slug')
            ->whereActive('on')
            ->latest('id')
            ->firstWhere('id', '<', $id);
    }

    protected function getNextPost($id)
    {
        return Post::select('title', 'slug')
            ->whereActive('on')
            ->oldest('id')
            ->firstWhere('id', '>', $id);
    }

    public function getPostByCategory($category_id)
    {
        return $this->getPostsOrderedByDate()
            ->whereHas('category', function ($q) use ($category_id) {
                $q->where('categories.id', $category_id);
            })->paginate(5);
    }

    public function getPostByTag($tag_slug)
    {
        return $this->getPostsOrderedByDate()
            ->whereHas('tags', function ($q) use ($tag_slug) {
                $q->where('tags.slug', $tag_slug);
            })->paginate(5);
    }
}
