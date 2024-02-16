@extends('admin.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <div class="form-inline">
                <h1 class="mr-4">Post</h1>
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
                   <th>Category</th>
                   <th>Tags</th>
                </tr>
             </thead>
             <tbody>
                <tr>
                     <td>{{$post->id}}</td>
                     <td>{{$post->title}}</td>
                     <td>{{$post->category->title}}</td>   
                     <td>
                        <div class="d-flex">
                        @foreach ($post->tags as $tag)
                            <div class="mr-1 rounded-lg bg-primary p-1">
                              {{$tag->title}}  
                           </div> 
                        @endforeach
                        </div>
                     </td>                 
                 </tr>
             </tbody>
          </table>
          
       </div>
    </div>
    <div class="form-inline">
      <h1 class="mr-4">Post card preview</h1>
    </div>
    <div class="card" style="width: 18rem;">
      <img src="{{url('storage/'. $post->preview_image)}}" class="card-img-top" alt="preview_image">
      <div class="card-body">
          <p class="card-text">{{$post->title}}</p>
          <div class="d-flex justify-content-between align-items-center">
               <a href="#" class="btn btn-primary">Read</a>
               <p class="card-text"><small class="text-muted">{{$post->created_at}}</small></p>
          </div>
      </div>
  </div>
    <div class="form-inline">
      <h2 class="mr-4">Post content</h2>
    </div>
    <div class="card">
      <img src="{{url('storage/'. $post->main_image)}}" class="card-img-top" alt="preview_image">
      <div class="card-body">
         <div class="card-text">
            {!!$post->content!!}
         </div>      
      </div>
    </div>
 </div>
@endsection