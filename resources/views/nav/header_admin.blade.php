<nav class="navbar  navbar-expand-lg bg-body-tertiary">
      <a class="navbar-brand" href="#">Navbar</a>
      <a class="navbar-brand" href="#">Navbar</a>
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
        <form action="/logout" method="POST">
          @csrf
          <button class="btn btn-dark">Log out</button>
        </form>
      </div>
  </nav>