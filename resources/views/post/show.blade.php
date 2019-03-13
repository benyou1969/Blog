@extends('layouts.app')
@section('title', $post->title)
@section('content')
<div>
  <div class="shadow-sm p-1 mb-5 bg-white rounded card border border-light">
      <div class="card-header bg-info text-white">
          <b>{{ $post->title }}</b>
          {{-- <small class="float-right">{{ $post->created_at }}</small> --}}
          <div class="float-right">
            <div class="btn-group dropleft">
              <button type="button" class="btn btn-sm btn-white dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              </button>
              <div class="dropdown-menu">
                <!-- Dropdown menu links -->
                    <a class="dropdown-item" href="#"><i class="far fa-bookmark"></i> Sava</a>
                    <a class="dropdown-item" href="#"><i class="far fa-flag"></i> Report</a>
                    @if($post->creator->id == auth()->id())
                    <a href="{{ $post->path() }}/edit" class="dropdown-item"><i class="far fa-edit"> Edit</i></a>
                    <div class="dropdown-divider"></div>
                    <form action="{{ $post->path() }}/delete" method="post" class="bg-danger text-white">
                      @csrf
                      @method("DELETE")
                      <button class="btn text-white bg-transparent border-0 dropdown-item" type="submit"><i class="color-danger far fa-trash-alt"></i> DELETE</button>
                    </form>
                    @endif
              </div>
            </div>
          </div>
      </div>
      <div class="card-body">
          <blockquote class="blockquote mb-0">
            <p>{{ $post->body }}</p>
                <footer class="float-right blockquote-footer">Someone famous in <cite title="Source Title">{{ $post->creator->name}}, 
                </cite></footer>
          </blockquote>
      </div>
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
        <p>This post was published on <small>{{ $post->created_at }}</small>, by <b><a href="#">{{ $post->creator->name }}</a></b>, 
          @if($post->creator->id == auth()->id())
              click if you want to edit the post <a href="{{ $post->path() }}/edit"><i class="far fa-edit"></i></a>
          @endif
        </p>
      </div>
    </div>
    <div class="d-flex justify-content-lg-start"> 
    <a href="{{ url("posts") }}" class="primary" title="Go back to posts"><i class="fas fa-arrow-circle-left shadow-sm p-2 mb-5 bg-white rounded" style="font-size: 30px;"></i></a>
    </div>
 </div>
@endsection