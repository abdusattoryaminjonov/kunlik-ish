@extends('layout')
@section('content')
    <div class=" hg1  text-center d-flex  justify-content-center">
        <div class="show-user pd1">
            <div class="card1">
                <div class="card_background_img1 ">
                    <h2>{{ $user->name }} {{ $user->surname }}</h2>
                </div>
                <form action="{{route('reportUser')}}" method="POST">
                    @csrf
                    <div class="user_details">
                        <div class="starclas">
                            <div class="stars">
                                <i class="fa-solid fa-star" style="color: #cccccc;"></i>
                                <i class="fa-solid fa-star" style="color: #cccccc;"></i>
                                <i class="fa-solid fa-star" style="color: #cccccc;"></i>
                                <i class="fa-solid fa-star" style="color: #cccccc;"></i>
                                <i class="fa-solid fa-star" style="color: #cccccc;"></i>
                            </div>
                        </div>
                    </div>

                    <div class="m-5">
                        <textarea id="editor" style="border-color: #97a7c0; " class="form-control" name="note"></textarea>
                    </div>


                    <input type="hidden" name="kimga" value="{{ $user->id }}">
                    <input type="hidden" name="ball" value="0" id="ball">
                    <button type="submit" class="btn btn-primary btn-sm">ok</button>
                </form>
                {{-- <div class="card_count">
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
                </div> --}}
            </div>
        </div>
    </div>
    <style>
        .card_profile_img1 {
            display: flex;
            justify-content: center;
        }

        .card_background_img1 {
            border-radius: 30px;
            background-color: #0d6efd;
            padding-top: 15px;
            color: white;
            height: 80px;
        }

        .fa-star {
            font-size: 50px
        }

        .pd1 {
            margin-top: 30px;

        }

        .starclas {
            margin-top: 30px;
        }

        .hg1 {
            height: 500px;
            align-items: center;
        }

        .card1 {
            border-radius: 0.5em;
        }

        .user_details {
            display: flex;
            justify-content: center;
        }

        .border {
            margin-top: -20px;
            padding: 15px;
            border-radius: 5px;
            background-color: white;
        }
    </style>
    <script src="https://cdn.ckeditor.com/ckeditor5/40.0.0/classic/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>
    <script>
        const stars = document.querySelectorAll(".stars i");
        stars.forEach((star, index1) => {
            star.addEventListener("click", () => {
                stars.forEach((star, index2) => {
                    console.log(index1);
                    index1 >= index2 ? star.classList.add("marck") : star.classList.remove(
                        "marck");
                    document.getElementById("ball").value = index1 + 1;
                });
            });
        });
    </script>
@endsection
