@extends('layouts.app')

@section('content')
  @php
    $firstBlog = false;
  @endphp
  @foreach($BlogPostTitlesAndIds as $BlogPostTitleAndId)
    @if($firstBlog == false)
      @php
        $firstBlog = true;
      @endphp
      <a href="{{URL::to('/blogposts/' . $BlogPostTitleAndId->blog_id)}}">
        <strong>{{$BlogPostTitleAndId->title}}</strong>
      </a>
    @elseif($firstBlog == true)
      <a href="{{URL::to('/blogposts/' . $BlogPostTitleAndId->blog_id)}}">
        <strong>{{$BlogPostTitleAndId->title}}</strong>
      </a>
    @endif
  @endforeach
@endsection
