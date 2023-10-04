@extends('layout')
@section('title', 'Home')
@section('content')

<div class="mt-5 ms-auto  me-auto" style="width:600px">
    <h2>What's up</h2>
    <form action="/logout" method="POST">
        @csrf
        <button class="btn btn-dark">Log out</button>
    </form>

    <div class="mt-5"> 
        <h2 >Create new Post </h2>
        <form action="/create-post" method="POST">
            @csrf
            <input class="form-control mt-3" type="text" placeholder="Sarlavha" name="title">
            <textarea  class="form-control mt-3" name="body" placeholder="Text yoz..."></textarea>
            <button class="btn btn-primary mt-3">Saqlash</button>
        </form>
                <form action="/stop" method="POST">
                    @csrf
                    @method('PUT')  
                    <input type="hidden" name="timeStart">
                    <input type="hidden" value="{{$time=now()->format('H:i:s')}}" name="timeStop">
                    <button class="btn btn-outline-danger"><a href="/stop/">Stop</a></button>
                </form>
    </div>
    <div class="border border-primary">
        <div >
            <h2>Posts</h2>
            @foreach ($posts as $post)
                <div>
                    <h3>{{$post['title']}} by {{$post->user->name}}</h3>
                    <p>{{$post['body']}}</p>
                    <p><a href="/edit-post/{{$post->id}}">Edit</a></p>
                    <form action="/delete-post/{{$post->id}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection

