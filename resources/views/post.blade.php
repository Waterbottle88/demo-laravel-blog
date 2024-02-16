@extends('layout')

@section('header')
<div id="intro" class="p-5 text-center bg-light">
    <h1 class="mb-3 h2">{{$post->title}}</h1>
    <p class="mb-3">{{$post->category->title}}</p>
  </div>
@endsection

@section('content')

<div class="container">
    
    <section class="text-center">
        <img src="{{url('storage/' . $post->main_image)}}" class="img-fluid">
      <div class="container d-flex flex-column ">
            {!!$post->content!!}
      </div>
    </section>
@endsection