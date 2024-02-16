@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <div class="form-inline">
                <h1 class="mr-4">Users</h1>
                <a href="{{route('admin.users.create')}}" class="btn btn-primary">Add User</a>
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
                   <th>Name</th>
                   <th>Email</th>
                   <th>Role</th>
                </tr>
             </thead>
             <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        <div class="mr-1 rounded-lg {{$user->role ? 'bg-primary' : 'bg-danger'}} p-1 text-center">
                            {{\App\Models\User::getRoles()[$user->role]}}
                        </div>
                    </td>
                    <td>
                        <td>
                            <a href="{{route('admin.users.show', $user->id)}}"><i class="far fa-eye mr-2"></i></a>
                        </td>
                        <td>
                            <a href="{{route('admin.users.edit', $user->id)}}"><i class="fas fa-pencil-alt mr-2 text-success"></i></a>
                        </td>
                        <td>
                            <form action="{{route('admin.users.destroy', $user->id)}}" method="POST">
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
