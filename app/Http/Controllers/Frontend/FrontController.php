<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
}
