<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    /**
     * @return \Illuminate\Routing\Redirector
     */

    // public function like(Post $post)
    // {

    //     $like_person = $post->like_people()->where("person_id", $post->person_id)->first();
    //     if ($like_person == null) {
    //         \DB::beginTransaction();
    //         try {
    //             $post->like_people()->attach($post->person_id);
    //             \DB::commit();
    //         } catch (\Exception $e) {
    //             \DB::rollback();
    //             abort(500);
    //         }
    //         \Session::flash('err_red', 'いいねしました！');
    //     } else {
    //         try {
    //             $post->like_people()->detach($post->person_id);
    //         } catch (\Exception $e) {
    //             abort(500);
    //         }
    //         \Session::flash('err_blue', 'いいねを取り消しました（TT）');
    //     }

    //     return redirect()->route('posts.show', ['person' => $post->person_id, 'post' => $post->id]);
    // }

    public function like(Request $request)
    {
        $post_id = $request->input('postId');
        $person_id = $request->input('personId');
        $post = Post::find($post_id);
        try {
            $post->like_people()->attach($person_id);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 422);
        }
        return response()->json(null, 200);
    }

    public function dislike(Request $request)
    {
        $post_id = $request->input('postId');
        $person_id = $request->input('personId');
        $post = Post::find($post_id);
        try {
            $post->like_people()->detach($person_id);
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(), 422);
        }
        return response()->json(null, 200);
    }

}
