@extends('layout')
@section('content')
    <div>
        <div class="d-flex user_bg_style">
            <div class="d-flex justify-content-center ">
                <h1>{{ auth()->user()->name }} {{ auth()->user()->surname }}</h1>

            </div>
        </div>
        <div class="d-flex justify-content-center ">
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

        <div>
            <ul class="nav nav-tabs " style="justify-content: center;" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home"
                        type="button" role="tab" aria-controls="home" aria-selected="true">Kasbim</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button"
                        role="tab" aria-controls="profile" aria-selected="false">Ish
                        yaratish</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button"
                        role="tab" aria-controls="contact" aria-selected="false">Ishlarim</button>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade d-flex flex-row  show active" style="justify-content: space-evenly;"
                    id="home" role="tabpanel" aria-labelledby="home-tab" tabindex="0">
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
                                            <form action="/delete-job/{{ $job->id }}" method="POST">
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
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" tabindex="1">
                    <div>
                        <form action="user.work.create" method="POST">
                            @csrf
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Sarlavha : </label>
                                <div class="col-sm-10" style="width: 400px">
                                    <input style="border-color: #4e95ff" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">To'liq ma'lumot : </label>
                                <div class="col-sm-10" style="width: 400px">
                                    <textarea style="border-color: #4e95ff" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Manzil : </label>
                                <div class="col-sm-10" style="width: 400px">
                                    <select id="inputState" class="form-select border border-primary chosen-select"
                                        name="place">
                                        @foreach ($v as $viloyat)
                                            <optgroup label="{{ $viloyat->name_uz }}">
                                                @foreach ($viloyat->tumanlari as $tuman)
                                                    <option value="{{ $tuman->id }}">{{ $tuman->name_uz }}</option>
                                                @endforeach
                                            </optgroup>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Sanasi : </label>
                                <div class="col-sm-10" style="width: 400px">
                                    <input style="border-color: #4e95ff" type="date" class="form-control">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab" tabindex="2">
                    follow
                </div>
            </div>
        </div>
    </div>
@endsection
