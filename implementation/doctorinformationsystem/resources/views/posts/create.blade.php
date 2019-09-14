@extends('layouts.app')

@section('title')
Create post
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12 col-sm-12">
        <h1>Create new post</h1>
        </div>

        <div class="col-md-12">
        @if($errors->any())
        <div class="alert alert-danger">
        <ul>
        @foreach($errors->all()as $error)
        <li>{{ $error}}</li>
        </ul>
        </div>
        @endif
        </div>

        <div class="col-md-12">
        <form action="{{ route('post.store')}}" method="post" enctype="multipart/form-data">
        @csrf
        </form>
        </div>
    </div>
</div>
@endsection