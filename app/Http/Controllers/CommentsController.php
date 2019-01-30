<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Post;

class CommentsController extends Controller
{
    public function store(Post $post, Request $request) 
    {
          $this->validate($request, [
            'body' => 'required|max:255',
          ]);
           $post->addComment([
             'user_id' => auth()->id(),
             'body' => request('body'),
           ]);
           return back();
    }
}