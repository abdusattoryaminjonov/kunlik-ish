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
                <div class="d-flex flex-column mb-3 p-3 bg_style">
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
                </div>
            </a>
        </div>

        <div>
            <ul class="nav nav-tabs " style="justify-content: center;" id="myTab" role="tablist">
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
                <div class="tab-pane fade d-flex flex-row mb-3" style="justify-content: space-evenly;" id="home-tab-pane"
                    role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                    <div>
                        <h4>Kasb qo'shish</h4>
                        <form action="/create-job" method="POST">
                            @csrf
                            <select class="form-select" style="width: 150px" name="name">
                                <option value="Quruvchi">Quruvchi</option>
                                <option value="Tikuvchi">Tikuvchi</option>
                                <option value="Tozalovchi">Tozalovchi</option>
                                <option value="Mehanik">Mehanik</option>
                                <option value="Haydovchi">Haydovchi</option>
                                <option value="Oddiy ishchi">Oddiy ishchi</option>
                                <option value="Musiqachi">Musiqachi</option>
                                <option value="Hisobchi">Hisobchi</option>
                            </select>
                            <button class="m-3"
                                style="background-color: #4e95ff;color:white; border-radius:5px">saqlash</button>
                        </form>
                    </div>
                    <div>
                        <h4>Mening kasblarim</h4>
                        <table class="table table-borderless">
                            <tbody>
                                @foreach ($jobs as $job)
                                    <div class="d-flex flex-row mb-3">
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
                                    </div>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">
                    new
                </div>
                <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab"
                    tabindex="0">
                    follow
                </div>
            </div>
        </div>
    </div>
@endsection
