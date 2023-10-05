@extends('layout')
@section('title', 'Home')
@section('content')
@auth
<div class="mt-5 ms-auto  me-auto" style="width:600px">
    <div class="d-flex justify-content-between" >
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
@endauth
@endsection