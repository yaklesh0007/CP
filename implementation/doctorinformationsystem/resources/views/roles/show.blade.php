@extends('layouts.app')
@section('title')
 show roles table
@endsection
@section('content')
<div class="container">
<div class="row">
<div class="col-md-10">
<h1 class="text-center">Display roles table</h1>
</div>
<div class="col-md-2">
<a href="/roles/create" class="btn btn-success">Create new role</a>
</div>
<table class="table table-hover table-striped">
  <thead>
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
      
    </tr>
  </thead>
  <tbody>
  @foreach($roles as $Roles)
    <tr>
      <td>{{$Roles->id}}</td>
      <td>{{$Roles->name}}</td>
      <td>
      <a class="btn btn-success" href="/roles/{{ $Roles->id}}/edit">Edit</a>
      <a class="btn btn-danger" href="#" onclick="
      var result = confirm('Are you sure you wish to delete this roles?');
                      if( result ){
                              event.preventDefault();
                              document.getElementById('delete-form').submit();
                      }
      ">Delete</a>
      <form id="delete-form" action="{{ route('roles.destroy',[$Roles->id]) }}" 
                method="POST" style="display: none;">
                        <input type="hidden" name="_method" value="delete">
                        @csrf
              </form>
      </td>
      
    </tr>
  @endforeach
    
  </tbody>
  </table
  {{!! $roles->links() !!}}
  </div>
</div>
@endsection