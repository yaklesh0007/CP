@extends('layouts.master')
@section('title')
Sliders 
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Sliders table </h4>
                @if(session('status'))
                <div class="alert alert-success">
                {{session('status')}}
                </div>
            @endif
              </div>
              <div class="card-body">
                <a href="/create-slider" class="btn btn-success">Add New Slider</a>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Name
                      </th>
                      <th>
                        Quates
                      </th>
                      <th>
                        Whose
                      </th>

                      <th>
                        Image
                      </th>
                     
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>

                    @foreach($sliders as $data)
                      <tr>
                        <td>
                          {{$data->name}}
                        </td>
                        <td>
                          {{$data->quates}}
                        </td>
                        <td>
                          {{$data->whose}}
                        </td>

                        <td>
                        <img src="/sliders/{{$data->image}}" alt="Image of {{$data->name}}"
                        style="width:100px; height:100px; float:left; border-radius:50%; 
                        margin-right:50px;">
                        </td>
                        
                        <td>
                        <a href="/edit-slider/{{$data->id}}" class="btn btn-success">Edit</a>
                          
                        <a class="btn btn-danger mt-1" href="#" onclick="
                             var result = confirm('Are you sure you wish to delete this user roles?');
                              if( result ){
                                      event.preventDefault();
                                      document.getElementById('delete-form').submit();
                              }
                              ">Delete</a>
                              <form id="delete-form" action="/delete-slider/{{ $data->id}}" 
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
