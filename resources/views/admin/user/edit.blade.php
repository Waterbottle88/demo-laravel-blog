@extends('admin.layout')

@section('content')

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit {{$user->id}} user</h1>
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

    <form action="{{route('admin.users.update', $user->id)}}" method="POST">
        @csrf
        @method('PATCH')
        <div class="mb-3">
            <label for="title" class="form-label">Username</label>
            <input type="text" class="form-control" name="name" value="{{$user->name}}">
        </div>
        <div class="mb-3">
            <label for="title" class="form-label">Email</label>
            <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required autocomplete="email">
        </div>
        <div class="mb-3">
            <label>Select Role</label>
            <select name="role" class="form-control">
                @foreach ($roles as $id => $role)
                    <option value="{{$id}}"
                        {{$id == $user->role ? ' selected' : ''}}
                        >{{$role}}</option>     
                @endforeach
            </select>
         </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
    @endsection
</div>