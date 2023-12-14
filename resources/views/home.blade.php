@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="puding11">
        <div class="d-flex justify-content-center ">
            <form action="{{ route('search') }}" method="POST" class="d-flex " role="search">
                @csrf
                <select class="form-select chosen-select classs11" name="job">
                    <option selected disabled>Which job</option>
                    @foreach ($jobs as $job)
                        <option value="{{ $job->id }}">{{ $job->name }}</option>
                    @endforeach
                </select>
                <select name="place" id="inputState" class="form-select border border-primary chosen-select">
                    <option selected disabled>Which district</option>
                    @foreach ($v as $viloyat)
                        <optgroup label="{{ $viloyat->name_uz }}">
                            @foreach ($viloyat->tumanlari as $tuman)
                                <option value="{{ $tuman->id }}">{{ $tuman->name_uz }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <div class="bac1">
                    <button class="btn btn-primary" type="submit">
                        <i class="fa-solid fa-magnifying-glass" style="color: #ffffff;"></i>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="container  pt-4">
        <div class="row">
            @foreach ($works as $work)
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="card border-0 bg-light rounded shadow">
                        <div class="card-body p-4">
                            <div style="height: 60px">
                                <h5>{{ $work->title }}</h5>
                            </div>
                            <div class="mt-3">
                                <h3><i class="fa-solid fa-sack-dollar fa-solid11"
                                        style="margin-right: 3px"></i>{{ number_format($work->price, 0, '.', ' ') }} so'm
                                </h3>
                                <h5><i class="fa-solid fa-calendar-days fa-solid11"
                                        style="margin-right: 3px"></i>{{ $work->date }}
                                </h5>
                                <hr>
                                <span class="text-muted d-block">
                                    <i class="fa-solid fa-location-dot fa-solid11"></i>
                                    {{ $work->tuman->name_uz }}</span>
                            </div>
                            <div class="mt-3 d-flex " style="justify-content: flex-end;">
                                <button class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal_{{ $work->id }}">
                                    To'liq ko'rish
                                </button>
                            </div>
                            <div class="mt-3 d-flex">
                                <p>Created at :</p>
                                <label style="margin-left: 5px">{{ $work->created_at->format('Y-m-d') }}</label>
                            </div>
                            <div class="mt-3 d-flex">
                                <p>
                                    <i class="fa-solid fa-user" style="font-size: 15px !important; color:#797979"></i>
                                </p>
                                <p style="color: #797979;margin-left: 3px;">{{ $work->users_count }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="exampleModal_{{ $work->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">{{ $work->title }}</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <h6>{!! $work->description !!}</h6>
                                <hr>
                                <div class="d-flex mt-2">
                                    <img style="width: 25px; margin-right: 5px" src="{{ asset('icons/user.ico') }}"
                                        alt="">
                                    <a href="{{ route('showUser', ['user' => $work->user->id]) }}"
                                        class="link-underline-light">{{ $work->user->name }} :
                                        owner</a>
                                </div>
                                <hr>
                                <div class="d-flex mt-2">
                                    <img style="width: 25px; margin-right: 5px" src="{{ asset('icons/kalendar.ico') }}"
                                        alt="">
                                    <h6>{{ $work->date }}</h6>
                                </div>
                                <div class="d-flex mt-2">
                                    <img style="width: 25px; margin-right: 5px" src="{{ asset('icons/kasb.ico') }}"
                                        alt="">
                                    <h6>{{ $work->jobrel->name }}</h6>
                                </div>
                                <div class="d-flex mt-2">
                                    <img style="width: 25px; margin-right: 5px" src="{{ asset('icons/tuman.ico') }}"
                                        alt="">
                                    <h6>{{ $work->tuman->name_uz }}</h6>
                                </div>
                                <div class="d-flex text-center mt-2">
                                    <img style="width: 25px; margin-right: 5px" src="{{ asset('icons/users.ico') }}"
                                        alt="">
                                    <h6>{{ $work->workers }} ta odam
                                    </h6>
                                </div>
                                <div class="d-flex text-center mt-2">
                                    <img style="width: 25px; margin-right: 5px"
                                        src="{{ asset('icons/workers_price.ico') }}" alt="">
                                    <h6>{{ number_format($work->price, 0, '.', ' ') }} so'm</h6>
                                </div>
                            </div>
                            @auth
                                <div class="modal-footer">
                                    <label>Ishga qo'shiling -> </label>
                                    <form action="{{ route('userInWork', ['user' => auth()->user()->id]) }}" method="POST">
                                        @csrf
                                        <input type="hidden" value="{{ $work->id }}" name="work_id">
                                        {{-- <input type="hidden" value="0" name="status"> --}}
                                        {{-- @if (count($work->user)) --}}
                                        <button type="submit" class="btn btn-primary" id="liveToastBtn">click</button>
                                    </form>
                                </div>
                            @endauth
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div>
            {{ $works->links() }}
        </div>
        <div class="toast-container position-fixed bottom-0 end-0 p-3">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true">
                <div class="toast-header">
                    <img src="..." class="rounded me-2" alt="...">
                    <strong class="me-auto">Bootstrap</strong>
                    <small>11 mins ago</small>
                    <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    Hello, world! This is a toast message.
                </div>
            </div>
        </div>

    </div>
    <style>
        .bac1 button {
            height: 44px;
        }

        .chosen-container-single {
            width: 320px !important;
            box-shadow: -14px 19px 20px -16px rgba(121, 148, 179, 0.75);
            -webkit-box-shadow: -14px 19px 20px -16px rgba(121, 148, 179, 0.75);
            -moz-box-shadow: -14px 19px 20px -16px rgba(121, 148, 179, 0.75);
        }

        .puding11 {
            padding-top: 50px !important;
        }

        .chosen-drop {
            width: 320px !important;
        }

        .chosen-container-single-nosearch {
            width: 320px !important;
            margin-left: 5px !important;
            bbox-shadow: -14px 19px 20px -16px rgba(121, 148, 179, 0.75);
            -webkit-box-shadow: -14px 19px 20px -16px rgba(121, 148, 179, 0.75);
            -moz-box-shadow: -14px 19px 20px -16px rgba(121, 148, 179, 0.75);
        }

        .chosen-single {
            margin-left: 0px !important;
            border-radius: 0px !important
        }

        .chosen-container-single .chosen-single div b {
            display: block !important;
            opacity: 0 !important;
        }

        .chosen-container-single .chosen-single {
            background-color: white !important;
            border-color: blue !important;
            margin-right: 15px;
            height: 10px !important;
        }

        .d-sm-flex {
            margin-top: 30px;
            flex-direction: column;
        }
    </style>

@endsection

@section('myJs')
    <link rel="stylesheet" href="{{ asset('chosen_v1.8.7/chosen.css') }}">
    <link rel="stylesheet" href="{{ asset('mystyle.css') }}">
    <script src="{{ asset('chosen_v1.8.7/chosen.jquery.js') }}"></script>
    <script>
        $(".chosen-select").chosen({
            disable_search_threshold: 10
        });
    </script>
@endsection
