<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>

    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

</head>

<body>
    <div class="form__wrapper">
        <form action="/login" class="form" method="POST">
            @csrf
            <h1 class="form__title">Admin Login</h1>
            <div class="form__group">
                <input type="email" name="correo" id="correo" class="form__input">
                <label for="correo" class="form__label" id="label__correo">Email</label>
            </div>
            <div class="form__group">
                <input type="password" name="contraseña" id="contraseña" class="form__input">
                <label for="contraseña" class="form__label" id="label__contraseña">Contraseña</label>
            </div>
            <div class="form__group flex">
                <input type="checkbox" name="remember" id="remember" checked>
                <label for="remember">Recordarme</label>
            </div>
            @isset ($error)
            <span class="error">{{ $error }}</span>
            @endisset
            <button type="submit" class="form__button">Ingresar</button>
        </form>
    </div>
</body>

<script>
    const inputs = document.querySelectorAll('.form__input');

    inputs.forEach(input => {
        input.addEventListener('change', function(e) {

            if (this.value === "") {
                this.nextElementSibling.classList.remove('active');
            } else {
                this.nextElementSibling.classList.add('active');
            }
        })
    })
</script>

</html>