<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function blog(){
      return view('pages.blog');
    }

    public function presentationPage(){
      return view('pages.presentationPage');
    }

    public function lessons(){
      return view('pages.lessons');
    }
}
