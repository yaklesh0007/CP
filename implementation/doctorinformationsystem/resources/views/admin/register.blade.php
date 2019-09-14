@extends('layouts.master')
@section('title')
Register users
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title"> Simple Table</h4>
                @if(session('status'))
                    <div class="alert alert-success">
                    {{session('status')}}
                    </div>
                @endif
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Email
                      </th>
                      <th>
                        City
                      </th>
                      <th >
                        phone
                      </th>
                      <th >
                        role-id
                      </th>
                      <th>
                      Action
                      </th>
                    </thead>
                    <tbody>
                    @foreach($users as $data)
                      <tr>
                        <td>
                          {{ $data->name}}
                        </td>
                        <td>
                          {{ $data->email}}
                        </td>
                        <td>
                          {{ $data->city}}
                        </td>
                        <td>
                          {{ $data->phone}}
                        </td>
                        <td>
                        {{ $data->role_id}}
                        </td>
                        <td>
                        <a href="/role-edit/{{$data->id}}" class="btn btn-success">Edit</a>
                        <a class="btn btn-danger" href="#" onclick="
                             var result = confirm('Are you sure you wish to delete this user roles?');
                              if( result ){
                                      event.preventDefault();
                                      document.getElementById('delete-form').submit();
                              }
                              ">Delete</a>
                              <form id="delete-form" action="/role-delete{{ $data->id}}" 
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
