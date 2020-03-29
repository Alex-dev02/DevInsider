@extends('layouts.bloglayout')

@section('blogTitle')
  {{$BlogPost->title}}
@endsection

@section('time')
  {{$BlogPost->created_at}}
@endsection

@section('blogContent')
  @parsedown($BlogPost->bodyContent)
@endsection
