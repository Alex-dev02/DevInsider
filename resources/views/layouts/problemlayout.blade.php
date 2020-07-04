<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="icon" href="{{ URL::asset('/css/dev.png') }}" type="image/x-icon"/>
</head>
<body>
    <div id="app">
      @include('inc.navbar')
      <div class="container">
        <div class="problemSentence">
          @yield('problemSentence')
        </div>
        <div class="inputExample">
          @yield('inputExample')
        </div>
        <div class="outputExample">
          @yield('outputExample')
        </div>
      </div>
    </div>
    <div class="submitSolutionField">
      @include('inc.codeEditor')
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ace/1.3.3/ace.js" type="text/javascript" charset="utf-8"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
    <script src="" type="text/javascript"></script>
    <script type="text/javascript">
        var editor = ace.edit("editor");
        editor.setTheme("ace/theme/chrome");
        editor.session.setMode("ace/mode/c_cpp");
        editor.session.setNewLineMode("auto");
        editor.getSession().on("change", function () {
          document.getElementById('codeSrc').value = editor.getSession().getValue().replace(/\r\n|\n|\r/g, '<br/>');
          console.log(editor.getSession().getValue());
        });
    </script>
</body>
</html>
