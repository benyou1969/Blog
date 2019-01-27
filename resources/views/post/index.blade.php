@extends('layouts.app')
@section('content')
  @foreach ($posts as $post)
      <h1><a href="{{ $post->path() }}">{{ $post->title }}</a></h1>
  @endforeach
@endsection