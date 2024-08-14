@extends('layouts.app')

@section('content')
  <div class="container">

  

    <form method="post">
      @csrf
      <div class="mb-3">
        <lable>Title</lable>
        <input type="text" name="title" class="form-control" value="{{ $article->title }}">
      </div>
      <div class="mb-3">
        <lable>Body</lable>
        <textarea name="body" class="form-control">{{ $article->body }}</textarea>
      </div>
      <div class="mb-3">
        <lable>Category</lable>
        <select class="form-select" name="category_id">
          @foreach($categories as $category)
            <option value="{{ $category['id'] }}">
              {{ $category['name'] }}
            </option>
          @endforeach
        </select>
      </div>
      <input type="submit" value="Update Article" 
        class="btn btn-primary">
    </form>
  </div>
@endsection