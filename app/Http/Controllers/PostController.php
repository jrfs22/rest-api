<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\post;
use App\http\Resources\PostResource;
use App\http\Resources\PostDetailResource;

class PostController extends Controller
{
    public  function index(){
        $posts = post::all();
        // return response()->json(['data' => $posts]);
        return PostResource::collection($posts);
    }

    public function show($id)
    {
        $post = post::with('writer:id,username,firstname,lastname')->findOrFail($id);
        // return response()->json(['data' => $post]);
        return PostDetailResource::make($post);
    }
}
