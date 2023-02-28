<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap 5.2.3</title>
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css"
        integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer" />
</head>

<body>
    <div class="container-box">
        <div class="row d-flex justify-content-center mt-5">
            <div class="col-5 mt-5">
                <h1>Profile</h1>
                <p><strong><a href="{{ route('login') }}">Login</a></strong></p>
                <ul>
                    <li>hora antes: {{ session()->get('hora_antes') }}</li>
                    <li>hora agora: {{ date('H-i-s') }}</li>
                </ul>
            </div>
        </div>
    </div>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.bundle.min.js"
        integrity="sha512-i9cEfJwUwViEPFKdC1enz4ZRGBj8YQo6QByFTF92YXHi7waCqyexvRD75S5NVTsSiTv7rKWqG9Y5eFxmRsOn0A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"></script>
</body>

</html>
