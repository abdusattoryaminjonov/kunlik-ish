@extends('layout')
@section('title', 'Home')
@section('content')

@auth
<div class="mt-5 ms-auto  me-auto" style="width:600px">
    <div class="d-flex justify-content-between" >
        <div>
            <h2>What's up  {{auth()->user()->name}}</h2>
            <form action="/logout" method="POST">
                @csrf
                <button class="btn btn-dark">Log out</button>
            </form>
        </div>
        <div>
            <h3>Davomat</h3>
            <div class="mt-3 d-flex flex-row">                    
                <form action="/start" method="POST">
                    @csrf
                    <input type="hidden" value="{{$time=now()->format('H:i:s')}}" name="timeStart">
                    <input type="hidden" name="timeStop" value="null">
                    <button class="btn btn-outline-success">Start</button>
                </form>
            </div>
        </div>
    </div>
</div>
@else
<div class="mt-5 ms-auto  me-auto" style=" width: 500px">
    <h2>Login</h2>
    <form action="/login" method="POST" style=" width: 500px">
        @csrf
        <div class="mb-3">
            <input type="text" placeholder="user name" class="form-control" name="name">
        </div>
        <div class="mb-3">
            <input type="password" class="form-control" name="password">
        </div>
        <button  class="btn btn-primary">Submit</button>
    </form>
    <form action="/r" method="GET" >
        <button class="btn btn-link ">Registratsiya</button>
    </form>
</div>
@endauth

@endsection