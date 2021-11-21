<?php

namespace App\Http\Controllers;

use App\Models\Person;
use App\Models\Post;
use App\Http\Requests\PostRequest;

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
        $posts = $posts->reverse();
        // dd($posts);
        return view('posts.index', compact('posts'));
    }


    public function create(Person $person = null)
    {
        return view('posts.create', compact('person'));
    }


    public function store(PostRequest $request)
    {
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            // dd($inputs);
            Post::create($inputs);
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg', 'ユーザーを作成しました。');
        return redirect(route('people.show', [$request->person_id]));
    }


    public function edit(Person $person, Post $post)
    {
        return view('posts.edit', compact(['person', 'post']));
    }


    public function update(PostRequest $request)
    {
        $inputs = $request->all();

        \DB::beginTransaction();
        try {
            $post = Post::find($inputs['id']);
            $post->fill([
                'title' => $inputs['title'],
                'content' => $inputs['content']
            ]);
            $post->save();
            \DB::commit();
        } catch (\Throwable $e) {
            \DB::rollback();
            abort(500);
        }

        \Session::flash('err_msg', '投稿を更新しました。');
        return redirect()->route('posts.show', ['person' => $post->person_id, 'post' => $post->id]);
    }

    //
    /**
     * 投稿詳細
     * @param App\Models\Person $person | App\Models\Post $post
     * @return \Illuminate\View\View|\Illuminate\Contracts\View\Factory
     * @author kawahata
     */
    public function show(Person $person, Post $post)
    {
        $is_liked = $post->like_people->where('pivot.person_id', $person->id)->first();
        if (isset($is_liked)) {
            $liked = true;
        } else {
            $liked = false;
        }
        return view('posts.show', compact('person', 'post', 'liked'));
    }

    public function destroy(Person $person, Post $post)
    {
        if (empty($person)) {
            \Session::flash('err_msg', 'ユーザーがいません。');
            return redirect()->route('people.index');
        } elseif (empty($post)) {
            \Session::flash('err_msg', '投稿がありません。');
            return redirect()->route('people.show', [$person->id]);
        }

        try {
            Post::destroy($post->id);
            // $this->destroy($person->id);
            // dd($person);
        } catch (\Throwable $e) {
            abort(500);
        }

        \Session::flash('err_msg', '投稿を削除しました。');
        return redirect(route('people.show', [$person->id]));
    }
}
