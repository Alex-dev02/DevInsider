<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;

class BlogPostsController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $BlogPost = BlogPost::find($id);
      return view('blogs.blogpost')->with('BlogPost', $BlogPost);
    }

}
