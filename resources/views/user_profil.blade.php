@extends('layout')
@section('content')
    <div>
        <div class="d-flex user_bg_style">
            <div class="d-flex justify-content-center ">
                <h1>{{ auth()->user()->name }} {{ auth()->user()->surname }}</h1>

            </div>
        </div>
        <div class="d-flex justify-content-center">
            <a href="#" style="color: rgb(67, 67, 67); text-decoration: none">
                <div class="d-flex flex-column mb-3 p-3 bg_style edit_user">
                    <div class="d-flex justify-content-start d_f_my">
                        <img style="width: 16px !important" src="{{ asset('icons/email.ico') }}">
                        <h4>{{ auth()->user()->email }}</h4>
                    </div>
                    <div class="d-flex justify-content-start d_f_my">
                        <img style="width: 16px !important" src="{{ asset('icons/phone.ico') }}">
                        <h4>{{ auth()->user()->phonenumber }}</h4>
                    </div>
                    <div class="d-flex justify-content-start d_f_my">
                        <img style="width: 16px !important" src="{{ asset('icons/age.ico') }}">
                        <h4>{{ auth()->user()->age }} yosh</h4>
                    </div>
                    <div class="d-flex justify-content-start d_f_my">
                        <img style="width: 16px !important" src="{{ asset('icons/location.ico') }}">
                        <h4>{{ auth()->user()->load('tuman')->tuman->name_uz }}</h4>
                    </div>
                </div>
            </a>
        </div>


        <div class="" style="min-height: 400px;">
            <ul class="nav nav-tabs d-flex" style="justify-content: center;" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                        type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Kasbim</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                        type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Ish
                        yaratish</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                        type="button" role="tab" aria-controls="contact-tab-pane"
                        aria-selected="false">Ishlarim</button>
                </li>
            </ul>

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade " id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
                    <div class="d-flex" style="justify-content: space-around;">
                        <div>
                            <h4>Kasb qo'shish</h4>
                            <form action="{{ route('user.jobs.add') }}" method="POST">
                                @csrf
                                <select class="form-select" style="width: 150px" name="name">
                                    @foreach ($jobs as $job)
                                        <option value="{{ $job->id }}">{{ $job->name }}</option>
                                    @endforeach
                                </select>
                                <button class="m-3"
                                    style="background-color: #4e95ff;color:white; border-radius:5px">saqlash</button>
                            </form>
                        </div>
                        <div>
                            <h4>Mening kasblarim</h4>
                            <table class="table table-borderless">
                                <tbody>
                                    @foreach (Auth::user()->load('jobs')->jobs as $job)
                                        <tr>
                                            <td>
                                                <h5 class="mt-2">{{ $job['name'] }}</h5>
                                            </td>
                                            <td>
                                                <form action="{{ route('user.delete.job', ['job' => $job->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-link">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab"
                    tabindex="0">
                    <div style="padding-top: 30px">
                        <div>
                            <form action="{{ route('user.work.create') }}" method="POST">
                                @csrf
                                <div class="d-flex" style="margin-bottom: 100px">
                                    <div>
                                        <div>
                                            <div class="d-flex">
                                                <label>Sarlavha </label>
                                                <p style="color: red">* Muxim</p>
                                            </div>
                                            <div class="col-sm-10 input-group" style="width: 415px">
                                                <span class="input-group-text">
                                                    <img style="width: 20px !important"
                                                        src="{{ asset('icons/title.ico') }}">
                                                </span>
                                                <input style="border-color: #97a7c0" type="text" id="icon"
                                                    class="form-control" name="title">
                                            </div>
                                            <div class="d-flex mt-3">
                                                <label>Manzil </label>
                                                <p style="color: red">* Muxim</p>
                                            </div>
                                            <div class="col-sm-10 input-group " style="width: 415px">
                                                <span class="input-group-text">
                                                    <img style="width: 20px !important"
                                                        src="{{ asset('icons/location.ico') }}">
                                                </span>
                                                <select id="inputState"
                                                    class="form-select border border-primary chosen-select"
                                                    style="border-color: #97a7c0 !important;" name="place">
                                                    @foreach ($v as $viloyat)
                                                        <optgroup label="{{ $viloyat->name_uz }}">
                                                            @foreach ($viloyat->tumanlari as $tuman)
                                                                <option value="{{ $tuman->id }}">{{ $tuman->name_uz }}
                                                                </option>
                                                            @endforeach
                                                        </optgroup>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div>
                                                <div class="d-flex mt-3">
                                                    <label>Ishchilar soni </label>
                                                    <p style="color: red">* Muxim</p>
                                                </div>
                                                <div class="col-sm-10 input-group" style="width: 200px">
                                                    <span class="input-group-text">
                                                        <img style="width: 25px !important"
                                                            src="{{ asset('icons/workers.ico') }}">
                                                    </span>
                                                    <input style="border-color: #97a7c0" type="number" name="workers"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div style="margin-left: 15px">
                                                <div class="d-flex mt-3">
                                                    <label>Ish xaqqi </label>
                                                    <p style="color: red">* Muxim</p>
                                                </div>
                                                <div class="col-sm-10 input-group" style="width: 200px">
                                                    <span class="input-group-text">
                                                        <img style="width: 25px !important"
                                                            src="{{ asset('icons/price.ico') }}">
                                                    </span>
                                                    <input style="border-color: #97a7c0" type="number" name="price"
                                                        class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div style="margin-left: 200px">
                                        <div class="d-flex">
                                            <label>To'liq ma'lumot </label>
                                            <p style="color: red">* Muxim</p>
                                        </div>
                                        <div class="col-sm-10 input-group" style="width: 415px;">
                                            <span class="input-group-text">
                                                <img style="width: 20px !important"
                                                    src="{{ asset('icons/description.ico') }}">
                                            </span>
                                            <textarea style="border-color: #97a7c0; " class="form-control" name="description"></textarea>
                                        </div>
                                        <div class="d-flex mt-3">
                                            <label>Kasbi </label>
                                            <p style="color: red">* Muxim</p>
                                        </div>
                                        <div class="col-sm-10 input-group " style="width: 415px">
                                            <span class="input-group-text">
                                                <img style="width: 20px !important" src="{{ asset('icons/job.ico') }}">
                                            </span>
                                            <select id="inputState"
                                                class="form-select border border-primary chosen-select"
                                                style="border-color: #97a7c0 !important;" name="job">
                                                @foreach ($jobs as $job)
                                                    <option value="{{ $job->id }}">{{ $job->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="d-flex">
                                            <div>
                                                <div class="d-flex mt-3">
                                                    <label>Ish kuni </label>
                                                    <p style="color: red">* Muxim</p>
                                                </div>
                                                <div class="col-sm-10 input-group" style="width: 200px">
                                                    <span class="input-group-text">
                                                        <img style="width: 25px !important"
                                                            src="{{ asset('icons/price.ico') }}">
                                                    </span>
                                                    <input style="border-color: #97a7c0" type="date" name="date"
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div>
                                                <button class="btn btn-primary sentre1" type="submit">
                                                    <img style="width: 20px !important"
                                                        src="{{ asset('icons/plus.ico') }}">
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade show active" id="contact-tab-pane" role="tabpanel"
                    aria-labelledby="contact-tab" tabindex="0">
                    <div class="d-flex justify-content-center">
                        <div>
                            <div class="work-post">
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="height: 100px">asd

        </div>
    </div>
@endsection
