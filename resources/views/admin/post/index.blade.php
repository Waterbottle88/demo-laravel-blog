@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <div class="form-inline">
                <h1 class="mr-4">Posts</h1>
                <a href="{{route('admin.posts.create')}}" class="btn btn-primary">Add Post</a>
            </div>
        </div>
      </div>
    </div>
</div>

<div class="col-6">
    <div class="card">
       <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
             <thead>
                <tr>
                   <th>ID</th>
                   <th>Title</th>
                   <th></th>
                </tr>
             </thead>
             <tbody>
                @foreach ($posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>
                        <td>
                            <a href="{{route('admin.posts.show', $post->id)}}"><i class="far fa-eye mr-2"></i></a>
                        </td>
                        <td>
                            <a href="{{route('admin.posts.edit', $post->id)}}"><i class="fas fa-pencil-alt mr-2 text-success"></i></a>
                        </td>
                        <td>
                            <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method("DELETE") 
                                <button type="submit" class="border-0 bg-transparent text-danger"><i class="fas fa-trash" role="button"></i></button>
                            </form>
                        </td>
                    </td>
                 </tr>
                @endforeach
             </tbody>
          </table>
       </div>
    </div>
 </div>
@endsection
