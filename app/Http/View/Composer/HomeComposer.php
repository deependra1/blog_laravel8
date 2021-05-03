<?php


namespace App\Http\View\Composer;


use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\View\View;

class HomeComposer
{
    public function compose(View $view)
    {
        $view->with([
            'categories'=>Category::has('posts')->get(),
            'recents'=>Post::select('title', 'slug', 'created_at', 'image')->latest()->take(5)->get(),
            'tags'=>Tag::all(),
        ]);
    }
}
