<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ToDoList Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

    @if (!Request::is('login') && !Request::is('registrasi'))
        @include('layouts.navbar')
    @endif

    <div class="container">
        @if (session('message'))
            <div class="alert alert-success" role="alert">
                {{ session('message') }}
            </div>
        @endif
        @yield('content')
    </div>

    <script>
        function previewImage(input) {
            if (input.files && input.files[0]) {
                let reader = new FileReader()
                reader.onload = (e) => {
                    const imgPreview = document.querySelector("#imagePreview")
                    imgPreview.src = e.target.result
                    imgPreview.classList.add('d-block')
                    imgPreview.classList.remove('d-none')
                }
                reader.readAsDataURL(input.files[0])
            }
        }
    </script>
    <script>
        // Menunggu 3 detik (3000 milidetik) sebelum menghilangkan elemen
        setTimeout(function() {
            var element = document.querySelector("div[role='alert']");
            if (element) {
                element.style.display = 'none';
            }
        }, 3000); // 3000 ms = 3 detik
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
