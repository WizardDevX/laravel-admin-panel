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
            @if (Session::has('status'))
            <span class="message__success">{{ Session::get('status') }}</span>
            @endif
            <div class="form__group">
                <input type="email" name="email" id="email" class="form__input">
                <label for="email" class="form__label" id="label__email">Correo</label>
            </div>
            @error ('email')
            <span class="message__error">{{ $message }}</span>
            @enderror
            <div class="form__group">
                <input type="password" name="password" id="password" class="form__input">
                <label for="password" class="form__label" id="label__password">Contraseña</label>
            </div>
            @error ('password')
            <span class="message__error">{{ $message }}</span>
            @enderror
            <div class="form__group flex">
                <input type="checkbox" name="remember" id="remember" checked>
                <label for="remember">Recordarme</label>
            </div>
            @error ('credentials')
            <span class="message__error">{{ $message }}</span>
            @enderror
            <a href="/forgotPassword" class="form__link">¿Olvido su contraseña?</a>
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