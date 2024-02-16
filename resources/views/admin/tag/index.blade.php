@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <div class="form-inline">
                <h1 class="mr-4">Tags</h1>
                <a href="{{route('admin.tags.create')}}" class="btn btn-primary">Add Tag</a>
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
                @foreach ($tags as $tag)
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->title}}</td>
                    <td>
                        <td>
                            <a href="{{route('admin.tags.show', $tag->id)}}"><i class="far fa-eye mr-2"></i></a>
                        </td>
                        <td>
                            <a href="{{route('admin.tags.edit', $tag->id)}}"><i class="fas fa-pencil-alt mr-2 text-success"></i></a>
                        </td>
                        <td>
                            <form action="{{route('admin.tags.destroy', $tag->id)}}" method="POST">
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
