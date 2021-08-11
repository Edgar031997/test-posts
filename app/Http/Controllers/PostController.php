<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostCommentRequest;
use App\Http\Requests\PostRequest;
use App\Models\Author;
use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function posts(Request $request){
        $posts = Post::with('author')->orderBy('id','desc')->paginate(5);

        if ($request->ajax()){
            return response()->json($posts,200);
        }else{
            return view('posts',compact('posts'));
        }
    }

    public function post($slug){
        $post = Post::with('author','comments')->where('slug',$slug)->first();

        return view('post',compact('post'));
    }

    public function postCreatePage()
    {
        return view('post_create');
    }

    public function postCreate(PostRequest $request){
        $author = Author::firstOrCreate([
            'author_ip' => $request->ip()
        ]);

        $post = Post::create([
            'author_id' => $author->id,
            'title' => $request->title,
            'text' => $request->text,
        ]);

        return response()->json($post,201);
    }

    public function postComment(PostCommentRequest $request){

        $comment = PostComment::create([
            'post_id' => $request->post_id,
            'name' => $request->name,
            'text' => $request->text,
        ]);

        return response()->json($comment,201);
    }
}
