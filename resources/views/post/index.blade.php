@extends('layouts.app')
@section('title', 'Index')
@section('content')
{{-- <div class="container"> --}}
    <div class="row">
        <div class="col-md-6 offset-md-3">
        @auth
            {{-- @include('post.create') <br> --}}
            @else 
                <div class="card shadow-sm p-3 mb-3 bg-white rounded">
                    <div class="card-body">
                         <p class="text-center">You should <a href="{{ route('login') }}">login</a> to see our posts</p>
                    </div>
                </div>
        @endauth
        </div>
        <div class="col-md-12 col-lg-8 shadow-sm p-2 mb-2 bg-white rounded">
            @if(count($posts))
            @foreach ($posts as $post)
            <div class="card border border-0">
                    <div class="card-body">
                        <a href="{{ $post->path() }}">{{ $post->title }}</a>
                        <a href="#" class="float-right">{{ count($post->comment) }} <i class="far fa-comment-alt"></i></a>
                    </div> 
                </div>
            @endforeach
            @else
            <div class="text-center">
                <div class="card">
                    <div class="card-body">
                        <p class="text-center">Sorry mate there's not post now.</p>
                    </div>
                </div>
            </div>    
        @endif
        </div>
    </div>
@endsection