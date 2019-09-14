@extends('layouts.app')
@section('title')
edit roles
@endsection
@section('content')
<div class="container">
<div class="row col-md-9 col-lg-9 col-sm-9 pull-right " style="background: white;">
<h1>Update Role </h1>

      <!-- Example row of columns -->
      <div class="row  col-md-12 col-lg-12 col-sm-12" >

      <form method="post" action="{{ route('roles.update',[$role->id]) }}">
                            @csrf

                            <input type="hidden" name="_method" value="put">

                            <div class="form-group">
                                <label for="role-name">Name<span class="required">*</span></label>
                                <input   placeholder="Enter role"  
                                          id="role-id"
                                          required
                                          name="name"
                                          spellcheck="false"
                                          class="form-control"
                                          value="{{ $role->name }}"
                                           />
                            </div>


                           
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"
                                       value="Submit"/>
                            </div>
                        </form>
   

      </div>
</div>
</div>
@endsection