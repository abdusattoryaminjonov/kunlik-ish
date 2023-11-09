@extends('layout')
@section('content')
    <div class=" hg1  text-center d-flex  justify-content-center">
        <div class="show-user pd1">
            <div class="card1">
                <div class="card_background_img1">
                    <h3>{{ $user->name }} {{ $user->surname }}</h3>
                    <div class="card_profile_img1">
                        <div>
                            <i class="fa-regular fa-star"></i>
                            <span class="nuber"></span>
                        </div>
                        <div>
                            <i class="fa-regular fa-star"></i>
                            <span class="nuber"></span>
                        </div>
                        <div>
                            <i class="fa-regular fa-star"></i>
                            <span class="nuber"></span>
                        </div>
                        <div>
                            <i class="fa-regular fa-star"></i>
                            <span class="nuber"></span>
                        </div>
                        <div>
                            <i class="fa-regular fa-star"></i>
                            <span class="nuber"></span>
                        </div>
                    </div>
                </div>
                <div class="user_details">
                </div>
                <div class="card_count">
                    <div class="count" style="margin-top: 2em">
                        <div class="data1">
                            <div>
                                <i class="fa-solid fa-user"></i>
                                <p>yoshi</p>
                            </div>
                            <h4>{{ $user->age }}</h4>
                        </div>
                        <div class="data1">
                            <div>
                                <i class="fa-solid fa-phone"></i>
                                <p>Telefon<br>raqami</p>
                            </div>
                            <h4>{{ $user->phonenumber }}</h4>
                        </div>
                        <div class="data1">
                            <div>
                                <i class="fa-solid fa-location-dot"></i>
                                <p>Manzili</p>
                            </div>
                            <h4>{{ $user->tuman->name_uz }}</h4>
                        </div>
                        <div class="data1">
                            <div>
                                <i class="fa-solid fa-user-doctor"></i>
                                <p>Kasbi</p>
                            </div>
                            @foreach ($user->load('jobs')->jobs as $job)
                                <h5>{{ $job['name'] }}</h5>
                            @endforeach
                        </div>
                        <div class="data1">
                            <div>
                                <i class="fa-solid fa-at"></i>
                                <p>Email</p>
                            </div>
                            <h5>{{ $user->email }}</h5>
                        </div>
                    </div>
                    <form action="">
                        <button class="btn btn-primary btn-sm mt-5">Ishga olish</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    .card_profile_img1 {
        display: flex;
        justify-content: center;
    }

    .fa-star {
        color: #fdfd0d;
        margin-bottom: 1em
    }

    .card_background_img1 {
        border-start-end-radius: 0.5em;
        border-start-start-radius: 0.5em;
        background-color: #0d6efd;
        color: white;
    }


    .pd1 {
        margin-top: 30px;

    }

    .hg1 {
        height: 500px;
        align-items: center;
    }

    .card1 {
        border-radius: 0.5em;
    }
</style>
