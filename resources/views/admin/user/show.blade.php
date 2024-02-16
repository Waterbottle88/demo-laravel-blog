@extends('admin.layout')

@section('content')
<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
            <div class="form-inline">
                <h1 class="mr-4">User</h1>
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
                <tr>
                  <td>{{$user->id}}</td>
                  <td>{{$user->name}}</td>
                  <td>{{$user->email}}</td>
                  <td>
                      <div class="mr-1 rounded-lg {{$user->role ? 'bg-primary' : 'bg-danger'}} p-1 text-center">
                          {{\App\Models\User::getRoles()[$user->role]}}
                      </div>
                  </td>
                 </tr>
             </tbody>
          </table>
       </div>
    </div>
 </div>
@endsection