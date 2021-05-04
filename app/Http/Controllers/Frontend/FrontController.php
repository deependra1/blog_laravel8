<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Repositories\FrontRepository;

class FrontController extends Controller
{
    protected $frontRepository;


    public function __construct(FrontRepository $frontRepository)
    {
        $this->frontRepository = $frontRepository;

    }

    public function index()
    {
        $heros= $this->frontRepository->getHeros();
        $posts = $this->frontRepository->getAllPosts();
        //dd($posts);
        return view('frontend.index', compact('heros','posts'));
    }

    public function show(Request $request, $slug)
    {
        $post = $this->frontRepository->getPostBySlug($slug);
        $title = __('') . '<strong>' . $post->title . '</strong>';
        return view('frontend.show', compact('post', 'title'));
    }

    public function byCategory(Category $category)
    {
        $posts = $this->frontRepository->getPostByCategory($category->id);
        $title = __('Posts by category:') . '<strong>' . $category->title . '</strong>';

        return view('frontend.index', compact('posts', 'title'));
    }

    public function byTag(Tag $tag)
    {
        $posts = $this->frontRepository->getPostByTag($tag->slug);
        $title = __('Posts by tag:') . '<strong>' . $tag->title . '</strong>';

        return view('frontend.index', compact('posts', 'title'));
    }
}
