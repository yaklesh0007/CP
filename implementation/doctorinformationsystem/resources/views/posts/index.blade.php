@extends('layouts.app')
@section('title')
Create post
@endsection
@section('content')
@if($message=Session::get('success'))
<div class="alert alert-success">
<p>{{ $message}}</p>
</div>
@endif
@endsection