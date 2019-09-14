@extends('layouts.master')
@section('title')
edit user
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="card">
            <div class="card-header">
                <h1>Edit users</h1>
            </div>
            <div class="card-body">
                <div class="col-md-6">
                    <form action="/role-register-update/{{$users->id}}" method="post">
                    <input name="_method" type="hidden" value="PUT">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email </label>
                        <input type="email" class="form-control" value="{{$users->email}}" 
                        aria-describedby="emailHelp" placeholder="Enter email" name="email">
                        
                    </div>

                    <div class="form-group">
                        <label for="role_id">Select role-id</label>
                        <select class="form-control" name="role_id">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        
                        </select>
                    </div>
                    <button type="submit" class="btn btn-success">Edit user role</button>
                    <a href="/dashboard" class="btn btn-danger">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

@endsection