@extends('layout')
@section('title', 'Home')
@section('content')
    <div class="mt-3">
        <div class="d-flex justify-content-around">
            <form action="/search" method="POST" class="d-flex " role="search">
                <select style="width: 300px" id="inputState" class="form-select border border-primary mx-3" name="job">
                    @foreach ($jobs as $job)
                        <option value="{{ $job->id }}">{{ $job->name }}</option>
                    @endforeach
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
    <div class="container mt-5 pt-4">
        <div class="row align-items-end mb-4 pb-2">
            <div class="col-md-8">
                <div class="section-title text-center text-md-start">
                    <h4 class="title mb-4">Find the perfect jobs</h4>
                    <p class="text-muted mb-0 para-desc">Start work with Leaping. Build responsive, mobile-first projects on
                        the web with the world's most popular front-end component library.</p>
                </div>
            </div><!--end col-->


        </div><!--end row-->
        @foreach ($works as $work)
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 mt-4 pt-2">
                    <div class="card border-0 bg-light rounded shadow">
                        <div class="card-body p-4">
                            <h5>{{ $work->title }}</h5>
                            <div class="mt-3">
                                <h6>{{ $work->description }}</h6>
                                <hr>
                                <span class="text-muted d-block"><i class="fa fa-map-marker"
                                        aria-hidden="true"></i>{{ $work->tuman->name_uz }}</span>
                            </div>
                            <div class="mt-3">
                                <a href="" class="btn btn-primary">To'liq ko'rish</a>
                            </div>
                            <div class="mt-3 d-flex">
                                <p>created in :</p>
                                <label style="margin-left: 5px">{{ $work->created_at->format('Y-m-d') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>


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
