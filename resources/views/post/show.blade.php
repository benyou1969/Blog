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
        {{ $post->comment->count() }} {{  str_plural('Comment', $post->comment->count())}} 
        <i class="far fa-comment-alt"></i>
        <div class="shadow-sm p-3 mb-4 bg-white rounded border border-black" style="margin-top:10px">
          @if(auth()->check())
            <form method="post" action="{{ $post->path() . '/comments' }}">
              @csrf
                <div class="form-group border border-light">
                  <textarea type="title" class="form-control" id="body" name="body" placeholder="Write a comment..."></textarea>
                </div>
                <div>
                    <button type="submit" class="btn btn-sm btn-light">Comment</button>
                </div>
            </form>    
          @else
             <p class="text-muted text-center">You must <a href="{{ route('login') }}">login</a> to create a comment.</p>
          @endif
        </div>
        @foreach ($post->comment as $comment)
          <div class="shadow-sm mb-2 bg-white rounded card border border-light" style="margin-bottom:10px">
            <div class="card-body">
             <a href="">{{ $comment->owner->name }}</a> <small class="text-muted">{{ $comment->created_at->diffForHumans() }}</small> {{ $comment->body }}
            </div>
          </div>
        @endforeach
     </div>
    </div>
 {{-- info --}}
    <div class="col-lg-4 col-md-5">
      <div class="bg-white text-muted shadow-sm p-3 mb-5 bg-white rounded" style="padding: 10px 10px">
        <p>This post was published on <small>{{ $post->created_at }}</small>, by <b><a href="#">{{ $post->creator->name }}</a></b>, </p>
      </div>
    </div>
 </div>
@endsection