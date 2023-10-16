@extends('layout')
@section('title', 'Work')
@section('content')
<div class="mt-5 ms-auto  me-auto" style="width:600px">
    <div class="d-flex justify-content-between" >
    
        <div>
            <h3>Davomat</h3>
            <div class="mt-3 d-flex flex-row">                    
                @foreach ($davomats as $davomat)
                    @if ($loop->last)
                    <form action="/stop/{{$davomat->id}}" method="POST">
                        @csrf
                        @method('PUT')  
                        <input type="hidden" name="timeStart" value="{{$davomat['time_start']}}">
                        <input type="hidden" value="{{$time=now()->format('H:i:s')}}" name="timeStop">
                        <button class="btn btn-outline-danger">Stop</button>
                    </form> 
                    @endif
                @endforeach
            </div>
        </div>
    </div>


    <div class="mt-5"> 
        <h2 >Create new Post </h2>
        <form action="/create-post" method="POST">
            @csrf
            <input class="form-control mt-3" type="text" placeholder="Sarlavha" name="title">
            <textarea  class="form-control mt-3" name="body" placeholder="Text yoz..."></textarea>
            <button class="btn btn-primary mt-3">Saqlash</button>
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