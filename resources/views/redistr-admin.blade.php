<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registratsya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>
    <div class="mt-5">
        <form action="/registr-admin" method="POST" class="ms-auto mt-auto me-auto" style=" width: 500px">
            @csrf
            <div class="mb-3">
                <input type="text" placeholder="user name" class="form-control" name="name">
            </div>
    
            <div class="mb-3">
                <input type="email" placeholder="email" class="form-control" name="email">
            </div>
    
            <div class="mb-3">
                <input type="text" placeholder="+998901234567" class="form-control" name="phonenumber">
            </div>
    
            <div class="mb-3">
                <input type="password" class="form-control" name="password">
            </div>
            <button  class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>