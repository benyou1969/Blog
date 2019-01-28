@extends('layouts.app')
@section('content')
      <div class="card">
            <div class="card-header">
              <b>{{ $post->title }}</b>
              <small class="float-right">{{ $post->created_at }}</small>
            </div>
            <div class="card-body">
              <blockquote class="blockquote mb-0">
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
                <footer class="float-right blockquote-footer">Someone famous in <cite title="Source Title">{{ $post->creator->name}}</cite></footer>
              </blockquote>
              <a href="{{ url("posts") }}" class="btn btn-primary">Go back</a>
            </div>
      </div>
      <hr>
      <div class="comments">
      @foreach ($post->comment as $comment)
        <div class="card">
          <div class="card-body">
           {{ $comment->body }}
          </div>
        </div>
      @endforeach
     </div>
@endsection