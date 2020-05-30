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
</body>
</html>
