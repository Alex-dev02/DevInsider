<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('blogTitle')</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" >
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </head>
    <body>
      @include('inc.navbar')
      <div class="blog-header headerblogspace">
        <div class="container contblog">
          <h1 class="blog-title">DevInsider Blog</h1>
          <p class="lead blog-description">Bine ai venit!</p>
      </div>
    </div>
    <hr>
    <div class="container">

      <div class="row">

        <div class="col-sm-8 blog-main">

          <div class="blog-post">
            <h2 class="blog-post-title">@yield('blogTitle')</h2>
            <p class="blog-post-meta">@yield('time'), Alex</p>
            @yield('blogContent')
          </div><!-- /.blog-post -->
        </div><!-- /.blog-main -->

        <!-- Here are the sidebar for some other blogs
        <div class="col-sm-3 offset-sm-1 blog-sidebar">
          <div class="sidebar-module sidebar-module-inset">
            <h4>Alte bloguri</h4>
            <ol>

            </ol>
          </div>

          <div class="sidebar-module">
            <h4>Unde ne poti gasi?</h4>
            <ol class="list-unstyled">
              <li><a href="#">GitHub</a></li>
              <li><a href="#">Twitter</a></li>
              <li><a href="#">Facebook</a></li>
            </ol>
          </div>

        </div><!-- /.blog-sidebar -->

      </div><!-- /.row -->

    </div><!-- /.container -->
    </body>
</html>
