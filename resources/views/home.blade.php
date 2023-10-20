@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="mt-3">
        <div class="d-flex justify-content-around">
            <form action="/search" method="POST" class="d-flex " role="search">
                <select style="width: 300px" id="inputState" class="form-select border border-primary mx-3" name="job">
                    <option value="Quruvchi">Quruvchi</option>
                    <option value="Tikuvchi">Tikuvchi</option>
                    <option value="Tozalovchi">Tozalovchi</option>
                    <option value="Mehanik">Mehanik</option>
                    <option value="Haydovchi">Haydovchi</option>
                    <option value="Oddiy ishchi">Oddiy ishchi</option>
                    <option value="Musiqachi">Musiqachi</option>
                    <option value="Hisobchi">Hisobchi</option>
                </select>
                <select style="width: 300px" id="inputState" class="form-select border border-primary chosen-select"
                    name="joyi">
                    @foreach ($v as $viloyat)
                        <optgroup label="{{ $viloyat->name_uz }}">
                            @foreach ($viloyat->tumanlari as $tuman)
                                <option value="{{ $tuman->id }}">{{ $tuman->name_uz }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
                <button class="btn btn-primary" type="submit">
                    <img style="width: 20px !important" src="{{ asset('icons/search.ico') }}">
                </button>
            </form>
        </div>
    </div>
    <h1>Home</h1>

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
