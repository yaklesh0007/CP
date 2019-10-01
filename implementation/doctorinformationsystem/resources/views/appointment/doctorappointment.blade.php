@extends('layouts.main')
@section('title')
Appointment 
@endsection

@section('content')
<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h4 class="card-title">Your Appointment </h4>
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
                        Appointment for
                      </th>
                      <th>
                        Patient's name
                      </th>
                      <th>
                        Patient's Email
                      </th>
                      <th>
                        Appointment date-time
                      </th>
                      
                      <th class="text-right">
                        Action
                      </th>
                    </thead>
                    <tbody>

                    @foreach($appointment as $data)
                    
                      <tr>
                        <td>
                          {{$data->title}}
                        </td>
                        <td>
                          {{$data->name}}
                        </td>
                        <td>
                          {{$data->email}}
                        </td>
                        <td>
                            {{$data->time}}
                        </td>
                        
                        <td class="text-right">
                        
                          
                        <a class="btn btn-danger mt-1" href="#" onclick="
                             var result = confirm('Are you sure you wish to delete this user roles?');
                              if( result ){
                                      event.preventDefault();
                                      document.getElementById('delete-form').submit();
                              }
                              ">Cancel</a>
                              <form id="delete-form" action="/delete-doctorappointment/{{ $data->id}}" 
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
