<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use App\Problem;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

class ProblemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $problem = Problem::find($id);
        return view('problems.problem')->with('problem', $problem);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $breaks = array("<br />","<br>","<br/>");
        $request['codeSrc'] = str_ireplace($breaks, "\r\n", $request['codeSrc']);
        Storage::put('text.txt', $request['codeSrc']);
        $process = new Process(array('bash', 'C:/xampp/htdocs/DevInsider/comp.sh'));
        $process->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
          throw new ProcessFailedException($process);
        }
        echo $process->getOutput();
    }
}
