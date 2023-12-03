<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registratsy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="mt-5">
        <form action="/register" method="POST" class="ms-auto mt-auto me-auto" style=" width: 500px">
            @csrf
            <div class="mb-3">
                <input type="text" placeholder="name" class="form-control" name="name">
            </div>
            <div class="mb-3">
                <input type="text" placeholder="surname" class="form-control" name="surname">
            </div>
            <div class="mb-3">
                <input type="number" placeholder="age" class="form-control" name="age">
            </div>
            <div class="mb-3">
                <input type="email" placeholder="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <select id="inputState" class="form-select border border-primary chosen-select" name="place">
                    @foreach ($v as $viloyat)
                        <optgroup label="{{ $viloyat->name_uz }}">
                            @foreach ($viloyat->tumanlari as $tuman)
                                <option value="{{ $tuman->id }}">{{ $tuman->name_uz }}</option>
                            @endforeach
                        </optgroup>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" placeholder="901112233" id="pattern-phone-mask"
                    name="phonenumber">
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" placeholder="password" name="password">
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>

    <script type="text/javascript">
        IMask(element, {
            mask: '+{998}(00)000-00-00',
            lazy: false, // make placeholder always visible
            placeholderChar: '0' // defaults to '_'
        })

        // function validateName(input) {
        //     IMask(input, {
        //         mask: /^[A-Za-zА-ЯЁа-яё\s]*$/,
        //     });
        // }

        // function validatePhone(input) {
        //     IMask(input, {
        //         mask: '+{998}(00)000-00-00'

        //     })
        // }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
