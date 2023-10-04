@extends('layout')
@section('title','Registratsiya')
@section('content')

<div class="mt-5">
    <form action="/register" method="POST" class="ms-auto mt-auto me-auto" style=" width: 500px">
        @csrf
        <div class="mb-3">
            <input type="text" placeholder="user name" class="form-control" name="name">
        </div>

        <div class="mb-3">
            <input type="email" placeholder="email" class="form-control" name="email">
        </div>

        <div class="mb-3">
            <input type="text" placeholder="+998901234567" class="form-control" name="phonenumber">
        </div>

        <div class="mb-3">
            <input type="password" class="form-control" name="password">
        </div>
        <button  class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
