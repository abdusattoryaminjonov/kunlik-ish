@extends('layout')
@section('title','Edit')
@section('content')
<div class="mt-5 ms-auto  me-auto" style="width:600px">
    <h1>Edit post</h1>
    <form action="/edit-post/{{$post->id}}" method="POST">
        @csrf
        @method('PUT')
        <input  class="form-control mt-3" type="text" name="title" value="{{$post->title}}">
        <textarea  class="form-control mt-3" name="body" >{{$post->body}}</textarea>
        <button class="mt-3 btn btn-primary">Save changes</button>
    </form>
</div>
@endsection
