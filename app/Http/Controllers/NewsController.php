<?php

namespace App\Http\Controllers;


use App\Models\Post;

class NewsController extends Controller
{
    public function index()
    {
        $news = Post::active()->orderBy('p_order')->paginate(10);
        return view('news.index', compact('news'));
    }

    public function details($slug)
    {
        $new = Post::active()->where('slug', $slug)->first();
        $recent_news = Post::active()->where('id', '!=', $new->id)->orderBy('id', 'desc')->get();
        $new->view_count = $new->view_count + 1;
        $new->save();

        return view('news.details', compact('new', 'recent_news'));
    }
}
