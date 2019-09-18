@extends('layouts.master')
@section('title')
Posts 
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Posts list table </h4>
                @if(session('status'))
                <div class="alert alert-success">
                {{session('status')}}
                </div>
            @endif
              </div>
              <div class="card-body">
                <a href="/create-post" class="btn btn-success">Add new post</a>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Title
                      </th>
                      <th>
                        Description
                      </th>
                      <th>
                        Image
                      </th>
                      <th>
                        User_id
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>

                    @foreach($posts as $data)
                      <tr>
                        <td>
                          {{$data->title}}
                        </td>
                        <td>
                          {{$data->description}}
                        </td>
                        <td>
                        <img src="/posts/{{$data->image}}" alt="Image of {{$data->title}}"
                        style="width:100px; height:100px; float:left; border-radius:50%; 
                        margin-right:50px;">
                        </td>
                        <td>
                          {{$data->user_id}}
                        </td>
                        <td class="text-right">
                        <a href="/edit-post/{{$data->id}}" class="btn btn-success">Edit</a>
                          
                        <a class="btn btn-danger mt-1" href="#" onclick="
                             var result = confirm('Are you sure you wish to delete this user roles?');
                              if( result ){
                                      event.preventDefault();
                                      document.getElementById('delete-form').submit();
                              }
                              ">Delete</a>
                              <form id="delete-form" action="/delete-post/{{ $data->id}}" 
                                        method="POST" style="display: none;">
                                                <input type="hidden" name="_method" value="delete">
                                                @csrf
                              </form>
                        </td>
                        
                      </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
          
 </div>
 @endsection
 @section('scripts')
 @endsection
