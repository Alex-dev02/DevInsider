<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lessons = Lesson::all();
        $test = "test";
        $data = array(
          'lessons' => $lessons,
          'chapters' => ['Introducere', 'Variabile', 'If'],
          'collapse_divs' => ['one', 'two', 'three'],
        );
        return view('pages.home')->with($data);
    }
}
