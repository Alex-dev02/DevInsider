<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\BlogPost;

class BlogPostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $BlogPostTitlesAndIds = BlogPost::select('title', 'blog_id')->get();
        return view('pages.blog')->with('BlogPostTitlesAndIds', $BlogPostTitlesAndIds);
    }

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
