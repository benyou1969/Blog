@extends('layouts.app')
@section('content')
<div class="row justify-content-md-center">
 <div class="col-md-9 col-lg-7 bg-white shadow-sm p-3 mb-5 bg-white rounded">
   <form action="/posts" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Enter title here...">
      </div>
      <div class="form-group">
        <label for="body">Description</label>
        <textarea class="form-control" id="body" name="body" rows="3" placeholder="Write description here..."></textarea>
      </div>
       <div class="form-group justify-content-left" style="width:60%">
        <label for="exampleFormControlSelect1">Example select</label>
        <select class="form-control" id="community" name="community_id">
          @foreach (\App\Community::all() as $community)
              <option value="{{ $community->id }}">{{  $community->slug}}</option>
          @endforeach
        </select>
      </div>
      <div class="d-flex justify-content-end">
         <button type="submit" class="btn btn-outline-secondary">Create <i class="fas fa-plus-square"></i></button>
      </div>
    </form>
  </div>
</div>   
@endsection