<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Storage;
use File;
use App\Problem;
use App\SolvedProblem;
use App\User;
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
    public function store(Request $request, $id)
    {
        $breaks = array("<br />","<br>","<br/>");
        $request['codeSrc'] = str_ireplace($breaks, "\r\n", $request['codeSrc']);
        $codeSourceFileName = $request->user()->name;
        $codeSourceFileName .= ".cpp";
        $problem = Problem::find($id);
        $testsInput = [$problem->test1_input, $problem->test2_input, $problem->test3_input, $problem->test4_input, $problem->test5_input];
        $testsExpectedOutput = [$problem->test1_expected_output, $problem->test2_expected_output, $problem->test3_expected_output, $problem->test4_expected_output, $problem->test5_expected_output];
        $dockerContainerName = $request->user()->name;
        Storage::put($codeSourceFileName, $request['codeSrc']);
        for($i = 1; $i <= 5; ++$i)
          Storage::put($i . "in" . $request->user()->name . ".txt", $testsInput[$i-1]);
        $process = new Process(['sh', '/opt/lampp/htdocs/DevInsider/comp.sh', $dockerContainerName]);
        $process->run();
        // executes after the command finishes
        if (!$process->isSuccessful()) {
          throw new ProcessFailedException($process);
        }
        //echo $process->getOutput();
        $errorFileLocation = '/opt/lampp/htdocs/DevInsider/storage/app/err' . $request->user()->name . '.txt';
        if(! 0 == filesize($errorFileLocation)){
          $error = file_get_contents($errorFileLocation);
          for($i = 1; $i <= 5; ++$i){
            unlink('/opt/lampp/htdocs/DevInsider/storage/app/' . $i . 'output' . $request->user()->name . '.txt');
            unlink('/opt/lampp/htdocs/DevInsider/storage/app/' . $i . 'in' . $request->user()->name . '.txt');
          }
          unlink('/opt/lampp/htdocs/DevInsider/storage/app/' . $request->user()->name . '.cpp');
          unlink($errorFileLocation);
          return view('problems.compilationError')->with('compilationError', $error);
        }
        $results;
        $incorrectlySolvedProblem = 0;
        for($i = 1; $i <= 5; ++$i){
          $results[$i] = strcmp(file_get_contents('/opt/lampp/htdocs/DevInsider/storage/app/' . $i . 'output' . $request->user()->name . '.txt'), $testsExpectedOutput[$i-1]);
          if($results[$i] != 0)
            $incorrectlySolvedProblem = 1;
          unlink('/opt/lampp/htdocs/DevInsider/storage/app/' . $i . 'output' . $request->user()->name . '.txt');
          unlink('/opt/lampp/htdocs/DevInsider/storage/app/' . $i . 'in' . $request->user()->name . '.txt');
        }
        unlink('/opt/lampp/htdocs/DevInsider/storage/app/' . $request->user()->name . '.cpp');
        unlink($errorFileLocation);
        $alreadySolvedProblem = SolvedProblem::where('problem_id', '=', $id)->where('solved_by_user_id', '=', $request->user()->id)->exists();
        if($incorrectlySolvedProblem == 0 && !$alreadySolvedProblem){
          $SolvedProblem = new SolvedProblem();
          $SolvedProblem->problem_id = $id;
          $SolvedProblem->solved_by_user_id = $request->user()->id;
          $SolvedProblem->save();
        }
        return view('problems.results')->with('results', $results);
    }
    // TO DO: trebuie sa adaugi restrictia de 30 de secunde pentru fiecare submisie;
}
