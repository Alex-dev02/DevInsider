@extends('layouts.app')

@section('content')
  <h1 style="text-align: center; padding: 3%;">Aici poți găsi toate blogurile!</h1>
  <div class = "row" style="text-align: center">
      @foreach($BlogPostTitlesAndIds as $BlogPostTitleAndId)
        <div class="col-md-4">
          <div class="thumbnail">
            <a href="{{URL::to('/blogposts/' . $BlogPostTitleAndId->blog_id)}}">
              <img class="img-responsive"src="{{URL::asset('https://res.cloudinary.com/devinsider/image/upload/v1585659207/images/blogbg_nswhwh.png')}}" width="350" height="200">
              <p style="text-align: center; font-size: 18px;">{{$BlogPostTitleAndId->title}}</p>
            </a>
          </div>
        </div>
      @endforeach
  </div>
@endsection
