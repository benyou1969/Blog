@extends('layouts.app')
@section('title', 'Creating...')
@section('content')
<div class="row justify-content-md-center">
 <div class="col-md-9 col-lg-7 bg-white shadow-sm p-3 mb-5 bg-white rounded">
   <form action="{{ route('store_post_method') }}" method="POST">
      @csrf
      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control {{ $errors->has('title') ? ' is-invalid' : '' }}" id="title" name="title" placeholder="Enter title here..." value="{{ old('title') }}" required>
      </div>
      <div class="form-group">
        <label for="body">Description</label>
        <textarea class="form-control {{ $errors->has('body') ? ' is-invalid' : '' }}" id="body" name="body" rows="3" placeholder="Write description here..." required>{{ old('body') }}</textarea>
      </div>
       <div class="form-group justify-content-left" style="width:60%">
        <label for="exampleFormControlSelect1">Select</label>
        <select  class="form-control  {{ $errors->has('community_id') ? ' is-invalid' : '' }}" id="community" name="community_id" required>
          <option value="">Choose one...</option>
          @foreach (\App\Community::all() as $community)
              <option value="{{ $community->id }}" {{ old("community_id") == $community->id ? 'selected' : '' }}>{{  $community->slug}}</option>
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