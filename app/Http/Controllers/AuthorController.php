<?php

namespace App\Http\Controllers;

use App\Models\Author;
use Illuminate\Http\Request;

class AuthorController extends Controller
{
    public function author(Request $request , $ip){
        $author = Author::where('author_ip',$ip)->first();
        $posts = $author->posts()->paginate(5);

        if($request->ajax()){
            return response()->json($posts,200);
        }else{
            return view('author',compact('author','posts'));
        }
    }
}
