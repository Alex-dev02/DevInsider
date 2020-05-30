@extends('layouts.problemlayout')

@section('problemSentence')
  {{$problem->problem_sentence}}
@endsection

@section('inputExample')
  {{$problem->test_input_example}}
@endsection

@section('outputExample')
  {{$problem->test_output_example}}
@endsection
