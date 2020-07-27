@extends('layouts.app')
<style media="screen">
  pre{
    background-color: white;
    text-align: center;
  }
</style>
@section('content')
  <h2 style="text-align: center;">Compilation Error!</h2>
  <pre>
    <code>
      <?php echo $compilationError = str_replace(["\r\n", "\r", "\n"], "<br/>", $compilationError)?>
    </code>
  </pre>
@endsection
