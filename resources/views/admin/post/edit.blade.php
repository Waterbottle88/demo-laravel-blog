@extends('admin.layout')

@section('content')



<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Create Post</h1>
        </div>
      </div>
    </div>
</div>

<div class="container">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{route('admin.posts.update', $post->id)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method("PATCH")
        <div class="mb-3">
            <label for="title" class="form-label">Title</label>
            <input type="text" class="form-control" name="title" value="{{$post->title}}">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Content</label>
            <textarea id="summernote" name="content">{{$post->content}}</textarea>
        </div>
        <img alt="main_image" src="{{ url('storage/' . $post->main_image) }}" class="w-25 mb-1">
        <div class="form-group">
            <label for="exampleInputFile">Add main image</label>
            <div class="input-group">
               <div class="custom-file">
                  <input type="file" class="custom-file-input" name="main_image" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
               </div>
               <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
               </div>
            </div>
         </div>
         <img alt="preview_image" src="{{ url('storage/' . $post->preview_image) }}" class="w-25 mb-1">
         <div class="form-group">
            <label for="exampleInputFile">Add preview image</label>
            <div class="input-group">
               <div class="custom-file">
                  <input type="file" class="custom-file-input" name="preview_image" value="{{old('preview_image')}}" id="exampleInputFile">
                  <label class="custom-file-label" for="exampleInputFile">Choose file</label>
               </div>
               <div class="input-group-append">
                  <span class="input-group-text">Upload</span>
               </div>
            </div>
         </div>
         <div class="form-group">
            <label>Select Category</label>
            <select name="category_id" class="form-control">
                <option value="">None</option> 
                @foreach ($categories as $category)
                    <option value="{{$category->id}}"
                        {{$category->id == $post->category_id ? ' selected' : ''}}
                        >{{$category->title}}</option>     
                @endforeach
            </select>
         </div>
         <div class="form-group">
            <label>Select Tag</label>
            <select class="select2" multiple="multiple" name="tag_ids[]" data-placeholder="Select a Tag" style="width: 100%;" >
              @foreach ($tags as $tag)
                <option 
                {{is_array($post->tags->pluck('id')->toArray()) && in_array($tag->id, $post->tags->pluck('id')->toArray()) ? ' selected' : ''}}
                value="{{$tag->id}}">{{$tag->title}}</option> 
              @endforeach
            </select>
          </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection
</div>