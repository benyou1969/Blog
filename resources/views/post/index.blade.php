@extends('layouts.app')
@section('content')
  @foreach ($posts as $post)
    <div class="card" style="margin-bottom: 20px">
      <div class="card-header">
        <a href="{{ $post->path() }}">{{ $post->title }}</a>
        <small class="float-right">{{ $post->created_at->diffForHumans() }}</small>
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p>{{ $post->body }}</p>
          <footer class="blockquote-footer">Created by <cite title="Source Title">Source Title</cite></footer>
        </blockquote>
      </div>
    </div>
  @endforeach
@endsection