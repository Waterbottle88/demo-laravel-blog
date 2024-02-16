@extends('admin.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <div class="form-inline">
                <h1 class="mr-4">Tag</h1>
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
                </tr>
             </thead>
             <tbody>
                <tr>
                    <td>{{$tag->id}}</td>
                    <td>{{$tag->title}}</td>
                 </tr>
             </tbody>
          </table>
       </div>
    </div>
 </div>
@endsection