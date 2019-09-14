@extends('layouts.app')
@section('title')
creat roles
@endsection

@section('content')
<div class="container">
      <div class="row" >
        <div class="col-md-12">
        <h1>Create new roles</h1>
        </div>
        <form method="post" action="{{ route('roles.store') }}">
                            @csrf


                            <div class="form-group row">
                            <label for="name" class="col-md-12 col-form-label">{{ __('Name') }}</label>

                            <div class="col-md-12">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" 
                                name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                                placeholder="Enter role type">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                            <div class="form-group">
                                <input type="submit" class="btn btn-primary"
                                       value="Submit"/>
                            </div>
         </form>
   </div>

</div>     
@endsection