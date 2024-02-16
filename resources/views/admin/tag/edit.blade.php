@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit {{$tag->id}} tag</h1>
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

    <form action="{{route('admin.tags.update', $tag->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
        <label for="title" class="form-label">Title</label>
        <input type="text" class="form-control" name="title" value="{{$tag->title}}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection
</div>