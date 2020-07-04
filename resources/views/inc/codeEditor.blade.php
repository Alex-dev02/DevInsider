<style type="text/css" media="screen">
    #editor {
        position: absolute;
        top: 150px;
        right: 150px;
        bottom: 150px;
        left: 150px;
    }
  .ace_editor {
		border: 1px solid lightgray;
		margin: auto;
		height: 65%;
		width: 55%;
	}
	.scrollmargin {
		height: 80px;
    text-align: center;
	}
  .codearea{
    white-space: pre-wrap;
  }
</style>

{!! Form::open(['action' => 'ProblemsController@store']) !!}
  <div id="editor"></div>
  <input class="codearea" name="codeSrc" type="hidden" id="codeSrc">
  {{Form::submit('Submit')}}
{!! Form::close() !!}
