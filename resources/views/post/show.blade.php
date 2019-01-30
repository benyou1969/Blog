@extends('layouts.app')
@section('content')
  <div class="shadow-sm p-2 mb-5 bg-white rounded card border border-light">
      <div class="card-header bg-info text-white">
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
  {{-- Comment --}}
  <div class="row">
    <div class="col-lg-8 col-md-7">
      <div class="shadow-sm p-3 mb-5 bg-white rounded">
        Comments <i class="far fa-comment-alt"></i>
        @foreach ($post->comment as $comment)
          <div class="shadow-sm mb-2 bg-white rounded card border border-light" style="margin-bottom:10px">
            <div class="card-body">
            {{ $comment->body }}
            </div>
          </div>
        @endforeach
     </div>
    </div>
 
    <div class="col-lg-4 col-md-5">
      <div class="bg-white text-muted shadow-sm p-3 mb-5 bg-white rounded" style="padding: 10px 10px">
        <p>  This post was published on <small>{{ $post->created_at }}</small>, by <b><a href="#">{{ $post->creator->name }}</a></b>, </p>
      </div>
    </div>
 </div>
@endsection