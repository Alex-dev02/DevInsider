<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lesson;
use App\SolvedLesson;
use App\Problem;
use App\SolvedProblem;
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
        $problems = Problem::all();
        $test = "test";
        $data = array(
          'lessons' => $lessons,
          'problems' => $problems,
          'chapters' => ['Introducere', 'Variabile', 'If'],
          'collapse_divs' => ['one', 'two', 'three'],
        );
        return view('pages.home')->with($data);
    }
}
