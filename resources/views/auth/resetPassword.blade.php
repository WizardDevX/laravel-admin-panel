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
        <form action="/forgotPassword" class="form" method="POST">
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">
            <h1 class="form__title">Recuperar Contraseña</h1>
            <div class="form__group">
                <input type="email" name="email" id="email" class="form__input">
                <label for="email" class="form__label" id="label__email">Email</label>
            </div>
            @error('email')
            <span class="error">{{ $message }}</span>
            @enderror
            <div class="form__group">
                <input type="password" name="password" id=password class="form__input">
                <label for="password" class="form__label" id="label__cotraseña">Contraseña</label>
            </div>
            @error('password')
            <span class="error">{{ $message }}</span>
            @enderror
            <div class="form__group">
                <input type="password" name="confirm_password" id=confirm_password class="form__input">
                <label for="confirm_password" class="form__label" id="label__confimar_cotraseña">Confirmar password</label>
            </div>
            @error('confirm_password')
            <span class="error">{{ $message }}</span>
            @enderror
            <button type="submit" class="form__button">Recuperar</button>
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