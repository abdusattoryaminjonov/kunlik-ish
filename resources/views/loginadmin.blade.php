<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Whisper&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Preahvihear&family=Source+Code+Pro:ital,wght@1,700&family=Whisper&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('mystyle.css') }}">
</head>

<body class="background" style="margin-left: 6em;">
    <div class="mt-5 ms-auto  me-auto " style=" width: 500px;">
        <div class="loginSentre ">
            <div class="d-flex justify-content-center login">
                <h1>
                    <a style="text-decoration: none;" href="/login"><i class="fa-brands fa-keycdn"
                            style="color: #783cfd;"></i>Login</a>
                </h1>
            </div>
            <div class="d-flex " style="align-items: baseline ;margin-left: 3em;">
                <h3 class="m-3"><a href="/loginadmin" style="display: contents">Admin</a></h3>
                <h4 class="m-2"><a href="/login" style="display: contents">User</a></h4>
            </div>
            <form action="/login-admin" method="POST" style=" width: 500px">
                @csrf
                <div class="mb-3 imptt">
                    <input type="text" placeholder="name" class="form-control shad" name="name">
                </div>
                <div class="mb-3 imptt">
                    <input type="password" class="form-control shad" placeholder="••••••" name="password">
                </div>
                <div style="display: flex;flex-direction: row-reverse;justify-content: space-around;">
                    <button class="btn btn-primary shad">Submit</button>
                </div>
            </form>

            {{-- <form action="/radmin" method="GET" style="display: flex;flex-direction: row-reverse;padding-right: 2em;">
                <button class="btn btn-link ">Registratsiya</button>
            </form> --}}
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
