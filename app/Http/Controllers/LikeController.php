<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class LikeController extends Controller
{
    /**
     * @return \Illuminate\Http\Request
     */

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
