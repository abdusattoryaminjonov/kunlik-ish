<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <a class="navbar-brand" href="#">Navbar scroll</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
            <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="/home">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tutorials
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li><a tabindex="-1" href="#">HTML</a></li>
                    <li><a tabindex="-1" href="#">CSS</a></li>
                    <li class="dropdown-submenu">
                        <a class="test" tabindex="-1" href="#">New dropdown <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                            <li><a tabindex="-1" href="#">2nd level dropdown</a></li>
                            <li class="dropdown-submenu">
                                <a class="test" href="#">Another dropdown <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">3rd level dropdown</a></li>
                                    <li><a href="#">3rd level dropdown</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <style>
                .dropdown-submenu {
                    position: relative;
                }

                .dropdown-submenu .dropdown-menu {
                    top: 0;
                    left: 100%;
                    margin-top: -1px;
                }
            </style>
            <script>
                $(document).ready(function() {
                    $('.dropdown-submenu a.test').on("click", function(e) {
                        $(this).next('ul').toggle();
                        e.stopPropagation();
                        e.preventDefault();
                    });
                });
            </script>

            <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Link</a>
            </li>
        </ul>
        {{-- @if (Auth::user()) --}}
        <h2><a href="/work" class="link-underline-light">{{ auth()->user()->name }}</a></h2>
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-dark">Log out</button>
        </form>
        {{-- @endif --}}
    </div>
</nav>
