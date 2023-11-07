<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="/home">
            <img style="width: 100px !important" src="{{ asset('icons/logo.png') }}">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
            aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " style="flex-direction: column;" id="navbarNav">
            <ul class="nav justify-content-center">
                <li class="nav-item">
                    <a class="nav-link active" href="/home">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/work">WoRk</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/show-user">show-user</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
        @auth
            
        <h4><a href="/profil" class="link-underline-light">{{ auth()->user()->name }}</a></h4>
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-dark btn-sm m-2" style="border-radius: 50px">
                <img style="width: 20px !important" src="{{ asset('icons/log_out.ico') }}">
            </button>
        </form>
        @endauth
        @guest
         <a href="/login">login</a>   
        @endguest
    </div>
</nav>
