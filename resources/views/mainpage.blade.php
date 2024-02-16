@extends('layout')

@section('header')
<div id="intro" class="p-5 text-center bg-light">
  <h1 class="mb-3 h2">Demo blog</h1>
  <p class="mb-3">Waterbottle88</p>
</div>
@endsection

@section('content')
<div class="container">
  <!--Section: Content-->
  <section class="text-center">

    <div class="container">
        <h1>Posts</h1>
        <div class="row">
            @foreach($posts as $post)
                <div class="col-md-4">
                    <div class="card mb-4">
                        <img src="{{ url('storage/' . $post->preview_image) }}" class="card-img-top" alt="{{ $post->title }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <a href="{{ route('post.show', $post->id) }}" class="btn btn-primary">Read More</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
  </section>
  <!--Section: Content-->

  <!-- Pagination -->
  <div class="d-flex" aria-label="">
    {{$posts->links()}} 
  </div>
</div>
@endsection
