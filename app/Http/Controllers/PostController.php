<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Post;

use Illuminate\Http\Request;

class PostController extends Controller
{
    //
    /**
     * 投稿一覧
     * @param App\Models\Person $person
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * @author kawahata
     */
    public function index(Person $person)
    {
        $posts = Post::with(['person'])->get();
        // dd($posts);
        return view('posts.index', compact('posts'));
    }
    //
    /**
     * 投稿一覧
     * @param App\Models\Person $person
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * @author kawahata
     */
    public function show(Person $person, Post $post)
    {
        
        return view('posts.show', compact('person', 'post'));
    }
}
