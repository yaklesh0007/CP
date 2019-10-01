@extends('layouts.master')
@section('title')
Posts 
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Feedback provided by users </h4>
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
                        Title
                      </th>
                      <th>
                        Description
                      </th>
                      
                      <th>
                        User_id
                      </th>
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>

                    @foreach($feedbacks as $data)
                      <tr>
                        <td>
                          {{$data->title}}
                        </td>
                        <td>
                          {{$data->description}}
                        </td>
                        
                        <td>
                          {{$data->user_id}}
                        </td>
                        <td class="text-right">
                        
                        <a class="btn btn-danger mt-1" href="#" onclick="
                             var result = confirm('Are you sure you wish to delete this user roles?');
                              if( result ){
                                      event.preventDefault();
                                      document.getElementById('delete-form').submit();
                              }
                              ">Delete</a>
                              <form id="delete-form" action="/delete-feedback/{{ $data->id}}" 
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
