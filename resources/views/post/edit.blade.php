@extends('layouts.app')
@section('content')
<div class="row justify-content-md-center">
 <div class="col-md-9 col-lg-7 bg-white shadow-sm p-3 mb-5 bg-white rounded">
   <form action="{{ $post->path() }}" method="POST">
      @csrf
      @method('PATCH')
      <h2 class="text-center">Edit Post</h2>
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title here..." value="{{ $post->title }}">
      </div>
      <div class="form-group">
        <label for="body">Description</label>
        <textarea class="form-control" id="body" name="body" rows="3" placeholder="Write description here...">{{ $post->body }}</textarea>
      </div>
       <div class="form-group justify-content-left" style="width:60%">
        <label for="exampleFormControlSelect1">Select Community:</label>
        <select class="form-control" id="community" name="community_id">
          @foreach ($post->community::all() as $community)
              <option value="{{ $community->id }}">{{  $community->slug}}</option>
          @endforeach
        </select>
      </div>
      <div class="d-flex justify-content-end">
         <button type="submit" class="btn btn-outline-primary">Edit  <i class="fas fa-plus-square"></i></button>
      </div>
    </form>
  </div>
</div>   
@endsection