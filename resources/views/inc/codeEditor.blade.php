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
</style>

{!! Form::open(['action' => 'ProblemsController@store']) !!}
  <div id="editor">
    //Your code goes here
  </div>
   <input name="hiddenInput" id="hiddenInput" style="display: none;">
  {{Form::submit('Submit')}}
  <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.3.3/ace.js" type="text/javascript" charset="utf-8"></script>
  <script>
      var editor = ace.edit("editor");
      editor.setTheme("ace/theme/chrome");
      editor.session.setMode("ace/mode/c_cpp");
      editor.session.on('change', function(delta) {
      var content=document.getElementById('hiddenInput');
      content.value=editor.getValue()
});
  </script>
{!! Form::close() !!}
